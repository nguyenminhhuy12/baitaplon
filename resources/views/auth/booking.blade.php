<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt vé - Hub Cinemas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .ghe {
            width: 40px;
            height: 40px;
            margin: 5px;
            display: inline-block;
            text-align: center;
            line-height: 40px;
            border-radius: 5px;
            cursor: pointer;
        }
        .ghe-trong {
            background-color: green;
            color: white;
        }
        .ghe-da-dat {
            background-color: red;
            color: white;
            cursor: not-allowed;
        }
        .ghe-da-chon {
            background-color: blue !important;
        }
        #chonGheContainer {
            display: none;
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <h2 class="text-center">Đặt vé: {{ $phim->TenPhim }}</h2>

        <!-- Chọn lịch chiếu -->
        <h4 class="mt-3">Chọn lịch chiếu:</h4>
        <div class="d-flex flex-wrap">
            @foreach ($lichChieus as $lichChieu)
                <button class="btn btn-outline-primary m-2 btn-lichchieu" data-malich="{{ $lichChieu->MaLichChieu }}" data-thoigian="{{ $lichChieu->ThoiGian }}">
                    {{ $lichChieu->ThoiGian }}
                </button>
            @endforeach
        </div>

        <!-- Giao diện chọn ghế -->
        <div id="chonGheContainer" class="mt-4">
            <h4 class="text-center">Chọn ghế</h4>
            <p class="text-center">
                <strong>Phim:</strong> {{ $phim->TenPhim }} | 
                <strong>Giờ chiếu:</strong> <span id="gioChieu"></span>
            </p>

            <div id="danhSachGhe" class="d-flex flex-wrap justify-content-center"></div>

            <input type="hidden" name="selectedSeats" id="selectedSeats" value="">
            <button class="btn btn-primary w-100 mt-3">Xác nhận đặt vé</button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function capNhatDanhSachGhe() {
                let selectedSeats = [];
                document.querySelectorAll(".ghe-da-chon").forEach(ghe => {
                    selectedSeats.push(ghe.getAttribute("data-maghe"));
                });
                document.getElementById("selectedSeats").value = selectedSeats.join(",");
            }

            function layDanhSachGheDaDat(maLichChieu, gioChieu) {
                console.log(`Lấy danh sách ghế cho lịch chiếu: ${maLichChieu}`);

                fetch(`/get-booked-seats/${maLichChieu}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`Lỗi HTTP! Status: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log("Danh sách ghế đã đặt:", data);

                        let danhSachGheContainer = document.getElementById("danhSachGhe");
                        danhSachGheContainer.innerHTML = ""; // Xóa ghế cũ

                        let soHang = 10, soCot = 10;
                        for (let hang = 1; hang <= soHang; hang++) {
                            let rowDiv = document.createElement("div");
                            rowDiv.className = "d-flex justify-content-center";

                            for (let cot = 1; cot <= soCot; cot++) {
                                let maGhe = "G" + ((hang - 1) * soCot + cot);
                                let classGhe = data.includes(maGhe) ? "ghe ghe-da-dat" : "ghe ghe-trong";
                                let gheElement = document.createElement("div");
                                gheElement.className = classGhe;
                                gheElement.setAttribute("data-maghe", maGhe);
                                gheElement.innerText = maGhe;

                                gheElement.addEventListener("click", function () {
                                    if (!this.classList.contains("ghe-da-dat")) {
                                        this.classList.toggle("ghe-da-chon");
                                        capNhatDanhSachGhe();
                                    }
                                });

                                rowDiv.appendChild(gheElement);
                            }

                            danhSachGheContainer.appendChild(rowDiv);
                        }

                        document.getElementById("gioChieu").innerText = gioChieu;
                        document.getElementById("chonGheContainer").style.display = "block"; // Hiện danh sách ghế
                    })
                    .catch(error => console.error("Lỗi khi lấy danh sách ghế:", error));
            }

            document.querySelectorAll(".btn-lichchieu").forEach(button => {
                button.addEventListener("click", function () {
                    let maLichChieu = this.getAttribute("data-malich");
                    let gioChieu = this.getAttribute("data-thoigian");
                    layDanhSachGheDaDat(maLichChieu, gioChieu);
                });
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
    let maLichChieuDangChon = null; // Lưu mã lịch chiếu đang chọn

    // Khi chọn lịch chiếu
    document.querySelectorAll(".btn-lichchieu").forEach(button => {
        button.addEventListener("click", function () {
            document.querySelectorAll(".btn-lichchieu").forEach(btn => btn.classList.remove("active"));
            this.classList.add("active");

            // Lưu mã lịch chiếu đã chọn
            maLichChieuDangChon = this.getAttribute("data-malich");

            // Hiển thị danh sách ghế của lịch chiếu này
            layDanhSachGheDaDat(maLichChieuDangChon, this.getAttribute("data-thoigian"));
        });
    });

    // Khi nhấn nút "Xác nhận đặt vé"
    document.querySelector(".btn-primary").addEventListener("click", function () {
            let selectedSeats = document.getElementById("selectedSeats").value;

            if (!maLichChieuDangChon) {
                alert("Lỗi! Không tìm thấy lịch chiếu.");
                return;
            }
            if (!selectedSeats) {
                alert("Vui lòng chọn ít nhất một ghế!");
                return;
            }

            // Gửi dữ liệu lên server bằng Fetch API
            fetch("{{ route('dat-ve') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({
                    ma_lich_chieu: maLichChieuDangChon, // Dùng giá trị đã lưu
                    ghe_da_chon: selectedSeats.split(",") // Chuyển chuỗi thành mảng
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Đặt vé thành công!");
                    window.location.href = "{{ route('home') }}"; // Chuyển hướng sau khi đặt vé
                } else {
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error("Lỗi khi đặt vé:", error);
                alert("Có lỗi xảy ra, vui lòng thử lại!");
            });
        });
    });


    </script>

</body>
</html>
