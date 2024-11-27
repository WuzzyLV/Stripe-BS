$(document).ready(function () {
  let edit = false;

  async function fetchPieteikumi(query) {
    const url = query ? `database/pieteikumi_list.php?query=${encodeURIComponent(query)}` : "database/pieteikumi_list.php";

    return new Promise((resolve, reject) => {
      $.ajax({
        url: url,
        type: "GET",
        success: function (response) {
          const list = JSON.parse(response);
          if (list.length === 0) {
            $("#pieteikumi").html("<tr><td colspan='8'>Nav rezultātu</td></tr>");
            resolve(); // Resolve the promise
            return;
          }
          let template = "";
          list.forEach((pieteikums) => {
            template += `
                        <tr piet_ID="${pieteikums.id}">
                            <td>${pieteikums.id}</td>
                            <td>${pieteikums.vards}</td>
                            <td>${pieteikums.uzvards}</td>
                            <td>${pieteikums.epasts}</td>
                            <td>${pieteikums.talrunis}</td>
                            <td>${pieteikums.datums}</td>
                            <td>${pieteikums.statuss}</td>
                            <td>
                                <a class="pieteikums-item">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a class="pieteikums-delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    `;
          });
          $("#pieteikumi").html(template);
          resolve(); // Resolve the promise when successful
        },
        error: function (error) {
          alert("Neizdevās ielādēt datus!");
          reject(error); // Reject the promise in case of error
        },
      });
    });
  }

  fetchPieteikumi();

  $("#search-clear").click(function () {
    $("#search").val("");
    $("#search-clear").hide();
    $("#search-btn").trigger("click");
  });
  // on enter in search field submit
  $("#search").keyup(function (event) {
    //check if is null
    if ($("#search").val() === "") {
      $("#search-clear").hide();
    } else {
      $("#search-clear").show();
    }
    if (event.key === "Enter") {
      $("#search-btn").trigger("click");
    }
  });
  //search
  $("#search-btn").click(async function () {
    let search = $("#search").val();
    $("#search-btn").html("<i class='fa-regular fa-face-smile loading'></i>");
    if (search != "") {
      await fetchPieteikumi(search);
    } else {
      await fetchPieteikumi();
    }
    $("#search-btn").html("<i class='fa-solid fa-magnifying-glass'></i>");
  });

  $(document).on("click", ".pieteikums-item", (e) => {
    $(".modal").css("display", "flex");
    $(".editing-info").css("display", "flex");
    const element = $(e.currentTarget).closest("tr");
    const id = $(element).attr("piet_ID");
    console.log(id);

    $.post("database/pieteikums_single.php", { id }, (response) => {
      edit = true;
      const pieteikums = JSON.parse(response);
      $("#vards").val(pieteikums.vards);
      $("#uzvards").val(pieteikums.uzvards);
      $("#epasts").val(pieteikums.epasts);
      $("#talrunis").val(pieteikums.talrunis);
      $("#apraksts").val(pieteikums.apraksts);
      $("#statuss").val(pieteikums.statuss);
      $("#piet_ID").val(pieteikums.id);
      $(".created-info").text(`Pieteikums izveidots: ${pieteikums.datums} (IP: ${pieteikums.created_ip})`);
      $(".edited-info").text(`Pēdējās izmaiņas pieteikumā: ${pieteikums.updated_at}`);
    });
  });

  $(document).on("click", ".close-modal", (e) => {
    $(".modal").hide();
    $(".editing-info").hide();
    $("pieteikumuForma").trigger("reset");
    edit = false;
  });

  $(document).on("click", "#new-btn", (e) => {
    $(".modal").css("display", "flex");
  });

  $(document).on("click", ".pieteikums-delete", (e) => {
    if (confirm("Vai tiešām velies dzest?")) {
      const element = $(e.currentTarget).closest("tr");
      const id = $(element).attr("piet_ID");
      $.post("database/pieteikums_delete.php", { id }, () => {
        fetchPieteikumi();
      });
    }
  });

  $("#pieteikumuForma").submit((e) => {
    e.preventDefault();
    const postData = {
      vards: $("#vards").val(),
      uzvards: $("#uzvards").val(),
      epasts: $("#epasts").val(),
      talrunis: $("#talrunis").val(),
      apraksts: $("#apraksts").val(),
      statuss: $("#statuss").val(),
      id: $("#piet_ID").val(),
    };

    const url = !edit ? "database/pieteikums_add.php" : "database/pieteikums_edit.php";
    console.log(postData, url);

    $.post(url, postData, () => {
      $(".modal").hide();
      //reseto datus no formas pec aizveršanas
      $("#pieteikumuForma").trigger("reset");
      edit = false;
      //   fetchPieteikumi();
      $("#search-btn").trigger("click");
    });
  });
});
