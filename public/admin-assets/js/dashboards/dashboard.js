function addnewtime() {
    const e = document.querySelector("#add_more_template").cloneNode(!0);
    document.querySelector("#add_more_container").appendChild(e);
}
function previewImage(e) {
    const t = document.querySelector("#image_office_image"),
        r = document.querySelector("#image_office_preview"),
        o = t.files[0];
    if (o.size > 2e6)
        return (
            swal({
                icon: "error",
                title: "Error",
                text: "Image size should not exceed 2MB",
            }),
            void (t.value = "")
        );
    const a = new FileReader();
    (a.onloadend = () => {
        r.src = a.result;
    }),
        o && ((r.style.display = "block"), a.readAsDataURL(o));
}
async function sendResetPassword() {
    const e = document.querySelector("#exampleInputEmail1").value;
    if (!e)
        return void swal({
            icon: "error",
            title: "Error",
            text: "Email is required",
        });
    const t = await fetch("/admin/send_reset_code", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            _token: document.querySelector('input[name="_token"]').value,
            email: e,
        }),
    }),
        r = await t.json();
    "success" === r.status
        ? swal({ icon: "success", title: "Success", text: r.message })
        : swal({ icon: "error", title: "Error", text: r.message });
}
$(function () {
    $(".counter-carousel").owlCarousel({
        loop: !0,
        rtl: !0,
        margin: 30,
        mouseDrag: !0,
        nav: !1,
        responsive: {
            0: { items: 2, loop: !0 },
            576: { items: 2, loop: !0 },
            768: { items: 3, loop: !0 },
            1200: { items: 5, loop: !0 },
            1400: { items: 6, loop: !0 },
        },
    });
    var e = {
        series: [
            { name: "Eanings this month", data: [1.5, 2.7, 2.2, 3.6, 1.5, 1] },
            {
                name: "Expense this month",
                data: [-1.8, -1.1, -2.5, -1.5, -0.6, -1.8],
            },
        ],
        chart: {
            toolbar: { show: !1 },
            type: "bar",
            fontFamily: "inherit",
            foreColor: "#adb0bb",
            height: 320,
            stacked: !0,
        },
        colors: ["var(--bs-primary)", "var(--bs-secondary)"],
        plotOptions: {
            bar: {
                horizontal: !1,
                barHeight: "60%",
                columnWidth: "20%",
                borderRadius: [6],
                borderRadiusApplication: "end",
                borderRadiusWhenStacked: "all",
            },
        },
        dataLabels: { enabled: !1 },
        legend: { show: !1 },
        grid: {
            borderColor: "rgba(0,0,0,0.1)",
            strokeDashArray: 3,
            xaxis: { lines: { show: !1 } },
        },
        yaxis: { min: -5, max: 5, title: {} },
        xaxis: {
            axisBorder: { show: !1 },
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
        yaxis: { tickAmount: 4 },
        tooltip: { theme: "dark" },
    };
    document.querySelector("#chart") &&
        (e = new ApexCharts(document.querySelector("#chart"), e)).render();
    document.querySelector("#breakup") &&
        (e = new ApexCharts(document.querySelector("#breakup"), {
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
                pie: { startAngle: 0, endAngle: 360, donut: { size: "75%" } },
            },
            stroke: { show: !1 },
            dataLabels: { enabled: !1 },
            legend: { show: !1 },
            colors: ["var(--bs-primary)", "#ecf2ff", "var(--bs-card-bg)"],
            responsive: [
                { breakpoint: 991, options: { chart: { width: 120 } } },
            ],
            tooltip: { theme: "dark", fillSeriesColor: !1 },
        })).render();
    document.querySelector("#earning") &&
        new ApexCharts(document.querySelector("#earning"), {
            chart: {
                id: "sparkline3",
                type: "area",
                height: 60,
                sparkline: { enabled: !0 },
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
            stroke: { curve: "smooth", width: 2 },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 0,
                    inverseColors: !1,
                    opacityFrom: 0.15,
                    opacityTo: 0,
                    stops: [20, 180],
                },
                opacity: 0.5,
            },
            markers: { size: 0 },
            tooltip: {
                theme: "dark",
                fixed: { enabled: !0, position: "right" },
                x: { show: !1 },
            },
        }).render();
    document.querySelector("#salary") &&
        (e = new ApexCharts(document.querySelector("#salary"), {
            series: [
                { name: "Weekly Visitors", data: [20, 15, 30, 25, 10, 15] },
            ],
            chart: {
                toolbar: { show: !1 },
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
                    distributed: !0,
                    endingShape: "rounded",
                },
            },
            dataLabels: { enabled: !1 },
            legend: { show: !1 },
            grid: {
                yaxis: { lines: { show: !1 } },
                xaxis: { lines: { show: !1 } },
            },
            xaxis: {
                categories: [
                    ["Mon"],
                    ["Tue"],
                    ["Wed"],
                    ["Thur"],
                    ["Fri"],
                    ["Saturday"],
                ],
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
            },
            yaxis: { labels: { show: !1 } },
            tooltip: { theme: "dark" },
        })).render();
    document.querySelector("#customers") &&
        new ApexCharts(document.querySelector("#customers"), {
            chart: {
                id: "sparkline3",
                type: "area",
                fontFamily: "inherit",
                foreColor: "#adb0bb",
                height: 60,
                sparkline: { enabled: !0 },
                group: "sparklines",
            },
            series: [
                {
                    name: "Customers",
                    color: "var(--bs-secondary)",
                    data: [30, 25, 35, 20, 30, 40],
                },
            ],
            stroke: { curve: "smooth", width: 2 },
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 0,
                    inverseColors: !1,
                    opacityFrom: 0.12,
                    opacityTo: 0,
                    stops: [20, 180],
                },
            },
            markers: { size: 0 },
            tooltip: {
                theme: "dark",
                fixed: { enabled: !0, position: "right" },
                x: { show: !1 },
            },
        }).render();
    document.querySelector("#projects") &&
        new ApexCharts(document.querySelector("#projects"), {
            series: [{ name: "", data: [4, 10, 9, 7, 9, 10, 11, 8, 10, 9] }],
            chart: {
                type: "bar",
                fontFamily: "inherit",
                foreColor: "#adb0bb",
                height: 60,
                resize: !0,
                barColor: "#fff",
                toolbar: { show: !1 },
                sparkline: { enabled: !0 },
            },
            colors: ["var(--bs-primary)"],
            grid: { show: !1 },
            plotOptions: {
                bar: {
                    horizontal: !1,
                    startingShape: "flat",
                    endingShape: "flat",
                    columnWidth: "60%",
                    barHeight: "20%",
                    endingShape: "rounded",
                    distributed: !0,
                    borderRadius: 2,
                },
            },
            dataLabels: { enabled: !1 },
            stroke: { show: !0, width: 2.5, colors: ["rgba(0,0,0,0.01)"] },
            xaxis: {
                axisBorder: { show: !1 },
                axisTicks: { show: !1 },
                labels: { show: !1 },
            },
            yaxis: { labels: { show: !1 } },
            axisBorder: { show: !1 },
            fill: { opacity: 1 },
            tooltip: {
                theme: "dark",
                style: { fontSize: "12px" },
                x: { show: !1 },
            },
        }).render();

    // GET DATA FROM DATABASE
    const getBrowserData = async () => {
        try {
            const response = await fetch("/api/get_browsers_view_today", {
                method: "POST",
                headers: { "Content-Type": "application/json" }
            });
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return await response.json();
        } catch (err) {
            console.log(err);
            return null; // Return null to handle the error case
        }
    };

    const renderChart = async () => {
        const todayData = await getBrowserData();
        if (!todayData) return; // Exit if data is null

        new ApexCharts(document.querySelector("#stats"), {
            chart: {
                id: "sparkline3",
                type: "area",
                height: 180,
                sparkline: { enabled: true },
                group: "sparklines",
                fontFamily: "inherit",
                foreColor: "#adb0bb",
            },
            series: [
                {
                    name: "Today Stats",
                    color: "var(--bs-primary)",
                    data: todayData, // Assign fetched data to the chart
                },
            ],
            stroke: { curve: "smooth", width: 2 },
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
            markers: { size: 0 },
            tooltip: {
                theme: "dark",
                fixed: { enabled: true, position: "right" },
                x: { show: false },
            },
        }).render();
    };

    // Call the renderChart function to render the chart
    renderChart();

    document.querySelectorAll('[data-delete_action="delete"]').forEach((e) => {
        e.addEventListener("submit", function (e) {
            e.preventDefault(),
                swal({
                    icon: "warning",
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    buttons: { cancel: "Cancel", confirm: "Yes" },
                }).then((t) => {
                    t && e.target.submit();
                });
        });
    });
    document
        .querySelector("#newarticleform")
        ?.addEventListener("submit", (e) => {
            e.preventDefault();
            const t = document.querySelector("#htmlarea");
            (t.value = JoditEditor.value),
                t.value.length < 10
                    ? swal({
                        icon: "error",
                        title: "Error",
                        text: "Article Content is required",
                    })
                    : e.target.submit();
        }),
        $("#toggleAddCategory").on("click", function () {
            $(".add_category_modal").toggleClass("active");
        }),
        $(".add_category_modal").click(function (e) {
            e.target.classList.contains("add_category_modal") &&
                $(".add_category_modal").toggleClass("active");
        }),
        document.querySelector("#terms_editor") &&
        ClassicEditor.create(document.querySelector("#terms_editor"))
            .then((e) => {
                e.editing.view.change((t) => {
                    t.setStyle(
                        "min-height",
                        "400px",
                        e.editing.view.document.getRoot()
                    );
                });
            })
            .catch((e) => { }),
        document.querySelector("#privacy_editor") &&
        ClassicEditor.create(document.querySelector("#privacy_editor"))
            .then((e) => {
                e.editing.view.change((t) => {
                    t.setStyle(
                        "min-height",
                        "400px",
                        e.editing.view.document.getRoot()
                    );
                });
            })
            .catch((e) => { });
});
