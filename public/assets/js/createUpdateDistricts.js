let citySelect = document.getElementById("city_id");
let districtSelect = document.getElementById("district_id");
let typeObject = document.getElementById('type_object');
let floor = document.getElementById('floor');
let balcony = document.getElementById('balcony');

function updateDistricts(cityId, selectedDistrictId) {
    districtSelect.innerHTML = '';

    let firstOption = null;

    let districtsByCity = window.districtsByCity;
    districtsByCity.forEach(function (district) {
        if (district.city_id == cityId) {
            let option = document.createElement("option");
            option.value = district.id;
            option.textContent = district.name;

            if (firstOption === null) {
                firstOption = option;
            }

            if (district.id == selectedDistrictId) {
                option.selected = true;
            }
            districtSelect.appendChild(option);
        }
    });

    if (districtSelect.selectedIndex === -1 && firstOption) {
        firstOption.selected = true;
    }
}

updateDistricts(citySelect.value, window.currentDistrictId);

districtSelect.addEventListener('change', function () {
    localStorage.setItem('selectedDistrictId', this.value);
});

citySelect.addEventListener("change", function () {
    let cityId = this.value;
    updateDistricts(cityId, null);
});


if (typeObject.value === 'Дом') {
    floor.disabled = true;
    balcony.disabled = true;
    floor.value = '';
}

typeObject.addEventListener('change', function () {
    if (typeObject.value === 'Дом') {
        floor.disabled = true;
        balcony.disabled = true;

        floor.value = '';
    } else {
        floor.disabled = false;
        balcony.disabled = false;
    }
});
