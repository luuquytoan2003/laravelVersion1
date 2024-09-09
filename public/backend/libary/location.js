"use strict"
let LQT = {}

LQT.getLocation = () => {
    const location = document.querySelectorAll('.location')
    location.forEach(element => {
        element.onchange = async () => {
            let option = {
                'data': {
                    'id': element.value,
                },
                'target': element.dataset.target
            }

            const result = await LQT.sendDataToGetLocation(option)
            const district = document.querySelector('.district');
            const ward = document.querySelector('.ward');

            if (element.dataset.target === 'district') {

                district.innerHTML = '<option value="0">[Chọn Quận/huyện]</option>'
                LQT.createElement(result, district)
            }
            else {

                ward.innerHTML = '<option value="0">[Chọn Xã/phường]</option>'
                LQT.createElement(result, ward)
            }
            if (option.target === 'district' && district_id !== '') {
                district.value = district_id
                district.dispatchEvent(new Event('change'))
            } else if (option.target === 'ward' && ward_id !== '') {
                ward.value = ward_id
                ward.dispatchEvent(new Event('change'))
            }
        }
    });
}

LQT.sendDataToGetLocation = async (option) => {
    try {
        const response = await fetch(`/ajax/location/getLocation`, {
            method: "POST",
            body: JSON.stringify(option),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        const result = await response.json()
        return result

    } catch (error) {
        console.log('ERROR>>>', error);
    }
}

LQT.createElement = (result, dom) => {
    result.map(item => {
        const option = document.createElement('option')
        option.value = item.code
        option.textContent = item.name
        dom.appendChild(option)
    })
}

LQT.loadCity = () => {
    if (province_id != '') {
        document.querySelector('.province').dispatchEvent(new Event('change'));
    }
}

document.addEventListener('DOMContentLoaded', () => {

    LQT.getLocation()
    LQT.loadCity()
})