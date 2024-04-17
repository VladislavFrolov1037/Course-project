let citySelect = document.getElementById("city_id");
let districtSelect = document.getElementById("district_id");

let districtsByCity = JSON.parse(citySelect.getAttribute('data-districts'));
let selectedDistrictId = citySelect.getAttribute('data-selected-district-id');

function updateDistricts(cityId, selectedDistrictId) {
    districtSelect.innerHTML = "";

    let option = document.createElement("option");
    option.value = 'any';
    option.textContent = 'Любой';
    districtSelect.appendChild(option);

    if (cityId !== "") {
        districtsByCity.forEach(function (district) {
            if (district.city_id == cityId) {
                let option = document.createElement("option");
                option.value = district.id;
                option.textContent = district.name;
                districtSelect.appendChild(option);
            }
        });
    }

    if (selectedDistrictId) {
        districtSelect.value = selectedDistrictId;
    }
}

updateDistricts(citySelect.value, selectedDistrictId);

citySelect.addEventListener("change", function () {
    let cityId = Number(this.value);
    updateDistricts(cityId, '');
});
