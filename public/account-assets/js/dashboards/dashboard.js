$(function () {
    //
    // Carousel
    //
    $(".counter-carousel").owlCarousel({
        loop: true,
        rtl: true,
        margin: 30,
        mouseDrag: true,

        nav: false,

        responsive: {
            0: {
                items: 2,
                loop: true,
            },
            576: {
                items: 2,
                loop: true,
            },
            768: {
                items: 3,
                loop: true,
            },
            1200: {
                items: 5,
                loop: true,
            },
            1400: {
                items: 6,
                loop: true,
            },
        },
    });
    // =====================================
    // Profit
    // =====================================
    var chart = {
        series: [
            {
                name: "Eanings this month",
                data: [1.5, 2.7, 2.2, 3.6, 1.5, 1.0],
            },
            {
                name: "Expense this month",
                data: [-1.8, -1.1, -2.5, -1.5, -0.6, -1.8],
            },
        ],
        chart: {
            toolbar: {
                show: false,
            },
            type: "bar",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
            height: 320,
            stacked: true,
        },
        colors: ["var(--bs-primary)", "var(--bs-secondary)"],
        plotOptions: {
            bar: {
                horizontal: false,
                barHeight: "60%",
                columnWidth: "20%",
                borderRadius: [6],
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "all",
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        grid: {
            borderColor: "rgba(0,0,0,0.1)",
            strokeDashArray: 3,
            xaxis: {
                lines: {
                    show: false,
                },
            },
        },
        yaxis: {
            min: -5,
            max: 5,
            title: {
                // text: 'Age',
            },
        },
        xaxis: {
            axisBorder: {
                show: false,
            },
            categories: [
                "16/08",
                "17/08",
                "18/08",
                "19/08",
                "20/08",
                "21/08",
                "22/08",
            ],
        },
        yaxis: {
            tickAmount: 4,
        },
        tooltip: {
            theme: "dark",
        },
    };

    if (document.querySelector("#chart")) {
        var chart = new ApexCharts(document.querySelector("#chart"), chart);
        chart.render();
    }

    // =====================================
    // Breakup
    // =====================================
    var breakup = {
        color: "#adb5bd",
        series: [38, 40, 25],
        labels: ["2022", "2021", "2020"],
        chart: {
            width: 180,
            type: "donut",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
        },
        plotOptions: {
            pie: {
                startAngle: 0,
                endAngle: 360,
                donut: {
                    size: "75%",
                },
            },
        },
        stroke: {
            show: false,
        },

        dataLabels: {
            enabled: false,
        },

        legend: {
            show: false,
        },
        colors: ["var(--bs-primary)", "#ecf2ff", "var(--bs-card-bg)"],

        responsive: [
            {
                breakpoint: 991,
                options: {
                    chart: {
                        width: 120,
                    },
                },
            },
        ],
        tooltip: {
            theme: "dark",
            fillSeriesColor: false,
        },
    };

    if (document.querySelector("#breakup")) {
        var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
        chart.render();
    }
    // =====================================
    // Earning
    // =====================================
    var earning = {
        chart: {
            id: "sparkline3",
            type: "area",
            height: 60,
            sparkline: {
                enabled: true,
            },
            group: "sparklines",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
        },
        series: [
            {
                name: "Earnings",
                color: "var(--bs-secondary)",
                data: [25, 66, 20, 40, 12, 58, 20],
            },
        ],
        stroke: {
            curve: "smooth",
            width: 2,
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 0,
                inverseColors: false,
                opacityFrom: 0.15,
                opacityTo: 0,
                stops: [20, 180],
            },
            opacity: 0.5,
        },

        markers: {
            size: 0,
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: true,
                position: "right",
            },
            x: {
                show: false,
            },
        },
    };
    if (document.querySelector("#earning")) {
        new ApexCharts(document.querySelector("#earning"), earning).render();
    }

    // =====================================
    // Salary
    // =====================================
    var salary = {
        series: [
            {
                name: "Employee Salary",
                data: [20, 15, 30, 25, 10, 15],
            },
        ],

        chart: {
            toolbar: {
                show: false,
            },
            height: 260,
            type: "bar",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
        },
        colors: [
            "var(--bs-primary-bg-subtle)",
            "var(--bs-primary-bg-subtle)",
            "var(--bs-primary)",
            "var(--bs-primary-bg-subtle)",
            "var(--bs-primary-bg-subtle)",
            "var(--bs-primary-bg-subtle)",
        ],
        plotOptions: {
            bar: {
                borderRadius: 4,
                columnWidth: "45%",
                distributed: true,
                endingShape: "rounded",
            },
        },

        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        grid: {
            yaxis: {
                lines: {
                    show: false,
                },
            },
            xaxis: {
                lines: {
                    show: false,
                },
            },
        },
        xaxis: {
            categories: [
                ["Apr"],
                ["May"],
                ["June"],
                ["July"],
                ["Aug"],
                ["Sept"],
            ],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            labels: {
                show: false,
            },
        },
        tooltip: {
            theme: "dark",
        },
    };

    if (document.querySelector("#salary")) {
        var chart = new ApexCharts(document.querySelector("#salary"), salary);
        chart.render();
    }

    // =====================================
    // Customers
    // =====================================
    var customers = {
        chart: {
            id: "sparkline3",
            type: "area",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
            height: 60,
            sparkline: {
                enabled: true,
            },
            group: "sparklines",
        },
        series: [
            {
                name: "Customers",
                color: "var(--bs-secondary)",
                data: [30, 25, 35, 20, 30, 40],
            },
        ],
        stroke: {
            curve: "smooth",
            width: 2,
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 0,
                inverseColors: false,
                opacityFrom: 0.12,
                opacityTo: 0,
                stops: [20, 180],
            },
        },

        markers: {
            size: 0,
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: true,
                position: "right",
            },
            x: {
                show: false,
            },
        },
    };
    if (document.querySelector("#customers")) {
        new ApexCharts(
            document.querySelector("#customers"),
            customers
        ).render();
    }

    // =====================================
    // Projects
    // =====================================
    var projects = {
        series: [
            {
                name: "",
                data: [4, 10, 9, 7, 9, 10, 11, 8, 10, 9],
            },
        ],
        chart: {
            type: "bar",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
            height: 60,

            resize: true,
            barColor: "#fff",
            toolbar: {
                show: false,
            },
            sparkline: {
                enabled: true,
            },
        },
        colors: ["var(--bs-primary)"],
        grid: {
            show: false,
        },
        plotOptions: {
            bar: {
                horizontal: false,
                startingShape: "flat",
                endingShape: "flat",
                columnWidth: "60%",
                barHeight: "20%",
                endingShape: "rounded",
                distributed: true,
                borderRadius: 2,
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 2.5,
            colors: ["rgba(0,0,0,0.01)"],
        },
        xaxis: {
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
            },
        },
        yaxis: {
            labels: {
                show: false,
            },
        },
        axisBorder: {
            show: false,
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            theme: "dark",
            style: {
                fontSize: "12px",
            },
            x: {
                show: false,
            },
        },
    };

    if (document.querySelector("#projects")) {
        var chart_column_basic = new ApexCharts(
            document.querySelector("#projects"),
            projects
        );
        chart_column_basic.render();
    }
    // =====================================
    // Stats
    // =====================================
    var stats = {
        chart: {
            id: "sparkline3",
            type: "area",
            height: 180,
            sparkline: {
                enabled: true,
            },
            group: "sparklines",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
        },
        series: [
            {
                name: "Today Stats",
                color: "var(--bs-primary)",
                data: [5, 15, 10, 20],
            },
        ],
        stroke: {
            curve: "smooth",
            width: 2,
        },
        fill: {
            type: "gradient",
            gradient: {
                shadeIntensity: 0,
                inverseColors: false,
                opacityFrom: 0.2,
                opacityTo: 0,
                stops: [20, 180],
            },
        },

        markers: {
            size: 0,
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: true,
                position: "right",
            },
            x: {
                show: false,
            },
        },
    };
    if (document.querySelector("#stats")) {
        new ApexCharts(document.querySelector("#stats"), stats).render();
    }

    // MY CUSTOM CODE
    const allDeleteForms = document.querySelectorAll(
        '[data-delete_action="delete"]'
    );

    allDeleteForms.forEach((form) => {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            swal({
                icon: "warning",
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this data!",
                buttons: {
                    cancel: "Cancel",
                    confirm: "Yes",
                },
            }).then((result) => {
                if (result) {
                    e.target.submit();
                }
            });
        });
    });

    //HandleFormSubmit
    const newArticleForm = document.querySelector("#newarticleform");
    newArticleForm?.addEventListener("submit", (e) => {
        e.preventDefault();
        const htmlArea = document.querySelector("#htmlarea");
        htmlArea.value = JoditEditor.value;
        if (htmlArea.value.length < 10) {
            swal({
                icon: "error",
                title: "Error",
                text: "Article Content is required",
            });
            return;
        }
        e.target.submit();
    });


    $("#toggleAddCategory").on("click", function () {
        $(".add_category_modal").toggleClass("active");
    })
    $(".add_category_modal").click(function (e) {
        if (e.target.classList.contains('add_category_modal')) {
            $(".add_category_modal").toggleClass("active");
        }
    })


    if (document.querySelector('#terms_editor')) {
        ClassicEditor
            .create(document.querySelector('#terms_editor'))
            .then(editor => {
                editor.editing.view.change(writer => {
                    writer.setStyle('min-height', '400px', editor.editing.view.document.getRoot());
                })
            })
            .catch(error => {
                console.error(error);
            });
    }

    if (document.querySelector('#privacy_editor')) {
        ClassicEditor
            .create(document.querySelector('#privacy_editor'))
            .then(editor => {
                editor.editing.view.change(writer => {
                    writer.setStyle('min-height', '400px', editor.editing.view.document.getRoot());
                })
            })
            .catch(error => {
                console.error(error);
            });
    }

});


function addnewtime() {
    const time = document.querySelector('#add_more_template').cloneNode(true);
    document.querySelector('#add_more_container').appendChild(time);
}

function previewImage(e) {
    const fileInput = document.querySelector("#image_office_image")
    const preview = document.querySelector("#image_office_preview");
    const file = fileInput.files[0];
    if (file.size > 2000000) {
        swal({
            icon: "error",
            title: "Error",
            text: "Image size should not exceed 2MB",
        });
        fileInput.value = "";
        return;
    }
    const reader = new FileReader();
    reader.onloadend = () => {
        preview.src = reader.result;
    };
    if (file) {
        preview.style.display = 'block';
        reader.readAsDataURL(file);
    }
}

async function sendResetPassword() {
    const email = document.querySelector('#exampleInputEmail1').value;
    if (!email) {
        swal({
            icon: "error",
            title: "Error",
            text: "Email is required",
        });
        return;
    }
    const response = await fetch('/admin/send_reset_code', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            _token: document.querySelector('input[name="_token"]').value,
            email
        })
    });
    const data = await response.json();
    if (data.status === 'success') {
        swal({
            icon: "success",
            title: "Success",
            text: data.message,
        });
    } else {
        swal({
            icon: "error",
            title: "Error",
            text: data.message,
        });
    }
}
