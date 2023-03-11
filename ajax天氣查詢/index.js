$.ajax({
    url: 'https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-373C6328-6BF2-41B3-BB3B-147802B82875&format=JSON&locationName=&elementName=&sort=time',
    method: "GET",
    datatype: "json",
    success: function (res) {
        data = res.records.locations[0];
        // console.log('data',data);
        city = data.location;
        fs_choose();
    }
})

function fs_choose() {
    document.getElementById('choose').innerHTML += `<option disabled selected>請選擇</option>`
    city.forEach(element => {
        document.getElementById('choose').innerHTML += `<option value='${element.locationName}'>${element.locationName}</option>`
    })
}

function todayWeather(name, idx) {
    // console.log(123)
    $('.weather_now').html('');
    chooseCity = name
    console.log(chooseCity);
    todayDate = new Date().toString().split("GMT")[0];

    let weather = city[idx].weatherElement;
    weatherDescription = weather[6].time[0].elementValue[0].value;
    let weatherTemp = city[idx].weatherElement[1].time[0].elementValue[0].value;

    $('.weather_now').html(`
    <h1>${chooseCity}</h1>
    <h2>${todayDate}</h2>
    <div class="now-description">${weatherDescription}</div>
    <p>溫度: ${weatherTemp} °C</p>
    `)
}


// change div
let Weeks = ['Sun', '', 'Mon', '', 'Tue', '', 'Wed', '', 'Thu', '', 'Fri', '', 'Sat'];
document.getElementById('choose').addEventListener('change', function () {

    document.querySelector('.weather-container').innerHTML = ''

    city.forEach((element, idx) => {
        if (element.locationName == this.value) {
            todayWeather(this.value, idx)
            // console.log(city);
            element.weatherElement[6].time.forEach((weather, idx2) => {
                if (idx2 % 2 == 0) {
                    console.log(weather.elementValue[0].value);
                    document.querySelector('.weather-container').innerHTML += `
                            <div class='box'>
                                <div class='weather-header'>
                                    ${Weeks[idx2]}
                                </div>
                                <div class='weather-body'>
                                    ${weather.elementValue[0].value}
                                </div>

                            </div>
                        `
                }
            })

        }
    })
})