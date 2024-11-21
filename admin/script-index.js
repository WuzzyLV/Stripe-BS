$(document).ready(function () {
  function fetchStats() {
    console.log("we up");
    $.ajax({
      url: "database/status.php",
      type: "GET",
      success: (res) => {
        console.log(res);
        setGeneralStats(res?.stats);
        setLastApplications(res?.applications);
        populateChart(res?.time_stats);
      },
      error: function () {
        alert("Neizdevās ielādēt datus!");
      },
    });
  }
  fetchStats();
});

function setGeneralStats(stats) {
  if (!stats) return;
  $("#new-applications").text(stats["Jauns"] ?? 0);
  $("#opened-applications").text(stats["Atvērts"] ?? 0);
  $("#waiting-applications").text(stats["Gaida"] ?? 0);
  $("#all-applications").text(stats["total"] ?? 0);
}

function setLastApplications(app) {
  if (!app) return;
  let template = "";
  app.forEach((pieteikums) => {
    template += `
        <tr piet_ID="${pieteikums.id}">
            <td>${pieteikums.vards} ${pieteikums.uzvards}</td>
            <td>${pieteikums.datums}</td>
            <td>${pieteikums.status}</td>
        </tr>
        `;
  });
  $("#applications-newest").html(template);
}

function populateChart(data) {
  if (!data) return;
  var ctx = document.getElementById("stats").getContext("2d");
  new Chart(ctx, {
    type: "line",
    data: {
      labels: data.labels,
      datasets: [
        {
          label: "Darbi",
          data: data,
          backgroundColor: "#E8907A",
          borderColor: "#FC4B1D",
          fill: true,
          borderWidth: 2,
          lineTension: 0.25,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      aspectRatio: 1.75,
      plugins: {
        tooltip: {
          backgroundColor: "rgba(255, 255, 255, 0.8)",
          titleColor: "gray",
          bodyColor: "gray",
          borderWidth: 1,
          borderColor: "rgba(0, 0, 0, 0.1)",
          displayColors: false,
          padding: 12,
          xAlign: "center",
          yAlign: "bottom",
          titleAlign: "center",
          bodyAlign: "center",
          bodyColor: "red",
          cornerRadius: 4,
        },
        legend: {
          display: false,
        },
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: function (value) {
              return Number.isInteger(value) ? value : null; // Display integers only
            },
            stepSize: 1, // Ensure step increments are whole numbers
          },
        },
      },
    },
  });
}
