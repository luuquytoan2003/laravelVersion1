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

            if (element.dataset.target === 'district') {
                const district = document.querySelector('.district');
                district.innerHTML = '<option value="0">[Chọn Quận/huyện]</option>'

                LQT.createElement(result, district)
            }
            else {
                const ward = document.querySelector('.ward');
                ward.innerHTML = '<option value="0">[Chọn Xã/phường]</option>'

                LQT.createElement(result, ward)

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

LQT.getLocation()