// Các biến toàn cục
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let selectedDate = null;

// Định dạng ngày tháng
const formatDate = (date) => {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return date.toLocaleDateString('en-US', options);
}

// Tạo lịch cho tháng hiện tại
const createCalendar = () => {
  const calendarDays = document.getElementById("calendar-days");
  calendarDays.innerHTML = '';

  const firstDay = new Date(currentYear, currentMonth, 1).getDay();
  const totalDays = new Date(currentYear, currentMonth + 1, 0).getDate();

  for (let i = 0; i < firstDay; i++) {
    const emptyDay = document.createElement("div");
    emptyDay.classList.add("calendar-day");
    calendarDays.appendChild(emptyDay);
  }

  for (let i = 1; i <= totalDays; i++) {
    const calendarDay = document.createElement("div");
    calendarDay.classList.add("calendar-day");
    calendarDay.innerText = i;

    if (
      currentYear === new Date().getFullYear() &&
      currentMonth === new Date().getMonth() &&
      i === new Date().getDate()
    ) {
      calendarDay.classList.add("active");
      selectedDate = new Date(currentYear, currentMonth, i);
      updateAvailableRooms(calculateAvailableRooms(selectedDate));
    }

    calendarDay.addEventListener("click", () => {
      selectDate(calendarDay);
    });

    calendarDays.appendChild(calendarDay);
  }

  document.getElementById("current-month").innerText = formatDate(new Date(currentYear, currentMonth));
};

// Chọn ngày trong lịch
const selectDate = (element) => {
  const previousActive = document.querySelector(".calendar-day.active");
  if (previousActive) {
    previousActive.classList.remove("active");
  }

  element.classList.add("active");
  selectedDate = new Date(currentYear, currentMonth, parseInt(element.innerText));
  updateAvailableRooms(calculateAvailableRooms(selectedDate));
};

// Tính toán số phòng còn trống
const calculateAvailableRooms = (date) => {
  // Thực hiện tính toán dựa trên ngày đã chọn
  // Thay thế logic này bằng logic tính toán của bạn
  // Đây chỉ là ví dụ, chúng ta sẽ sử dụng một số ngẫu nhiên
  return Math.floor(Math.random() * 20);
};

// Cập nhật số phòng còn trống
const updateAvailableRooms = (count) => {
  const availableRoomsElement = document.getElementById("available-rooms");
  availableRoomsElement.innerText = count;
};

// Chuyển đến tháng trước
const previousMonth = () => {
  if (currentMonth === 0) {
    currentYear--;
    currentMonth = 11;
  } else {
    currentMonth--;
  }
  createCalendar();
};

// Chuyển đến tháng kế tiếp
const nextMonth = () => {
  if (currentMonth === 11) {
    currentYear++;
    currentMonth = 0;
  } else {
    currentMonth++;
  }
  createCalendar();
};

// Tạo lịch cho tháng hiện tại khi tải trang
document.addEventListener("DOMContentLoaded", () => {
  createCalendar();
});

