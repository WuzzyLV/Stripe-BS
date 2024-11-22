let editingUser = false;

$(document).ready(function () {
  fetchUsers();
});

function fetchUsers() {
  $.ajax({
    url: "database/users/users.php",
    type: "GET",
    success: (res) => {
      console.log(res);
      populateUsers(res);
    },
    error: function () {
      alert("Neizdevās ielādēt datus!");
    },
  });
}

function populateUsers(users) {
  if (!users) return;
  let template = "";
  users.forEach((user) => {
    template += `
            <tr id="${user.id}">
                <td>${user.id}</td>
                <td>${user.lietotajvards}</td>
                <td>${user.vards}</td>
                <td>${user.uzvards}</td>
                <td>${user.epasts}</td>
                <td>${user.loma == "admin" ? "Administrātors" : "Moderators"}</td>
                <td>${user.created_at}</td>
                <td>
                    <a class="user-edit pieteikums-item">
                        <i class="fa fa-edit"></i>
                    </a>
                  <a class="user-delete pieteikums-delete">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            `;
  });
  $("#users-table").html(template);

  $(document).on("click", ".close-modal", (e) => {
    $(".modal").hide();
    $("#user-form").trigger("reset");
    $("#error").text("");
    $("#password-dropdown").hide();
    $("#password").prop("required", true);
    $("#password").show();
    edit = false;
  });

  $(document).on("click", "#new-btn", (e) => {
    $(".modal").css("display", "flex");
    $("#password-dropdown").hide();
    $("#password").prop("required", true);
    $("#password").show();
  });

  $("#user-form").on("submit", (e) => {
    e.preventDefault();

    $.post(
      "database/users/edit.php",
      {
        lietotajvards: $("#lietotajvards").val(),
        vards: $("#vards").val(),
        uzvards: $("#uzvards").val(),
        epasts: $("#epasts").val(),
        loma: $("#loma").val(),
        password: $("#password").val(),
        id: $("#piet_ID").val(),
      },
      (res) => {
        console.log("form sent", res);
        $(".close-modal").trigger("click");
        editingUser = false;
        fetchUsers();
      }
    ).fail((xhr, status, error) => {
      $("#error").text(xhr?.responseJSON?.error);
    });
  });

  $(document).on("click", ".user-edit", (e) => {
    $(".modal").css("display", "flex");
    $("#password-dropdown").show();
    $("#password").prop("required", false);
    $("#password").hide();

    const element = $(e.currentTarget).closest("tr");
    const id = $(element).attr("id");
    console.log(id);

    $.get(`database/users/user.php?id=${id}`, (res) => {
      $("#lietotajvards").val(res.lietotajvards);
      $("#vards").val(res.vards);
      $("#uzvards").val(res.uzvards);
      $("#epasts").val(res.epasts);
      $("#loma").val(res.loma);
      $("#piet_ID").val(res.id);
      editingUser = true;
    }).fail((xhr, status, error) => {
      alert("Neizdevās ielādēt lietotāja datus!");
    });
  });

  $(document).on("click", ".user-delete", (e) => {
    if (confirm("Vai tiešām velies dzest?")) {
      const element = $(e.currentTarget).closest("tr");
      const id = $(element).attr("id");
      $.post("database/users/delete.php", { id }, () => {
        fetchUsers();
      });
    }
  });
}

function togglePasswordField() {
  if ($("#password").is(":visible")) {
    $("#password").hide();
    $("#password").prop("required", false);
  } else {
    $("#password").show();
    $("#password").val("");
    $("#password").prop("required", true);
  }
}
