<?php
        require_once 'includes/heading.inc.php';
        require_once 'includes/functions.inc.php';
        include_once 'includes/header.inc.php';

?>
<link rel="stylesheet" href="css/weather.css">
      

<body>


<div class="main">
        <div class="row">

            <div class="col-md-9">

            </div>


            <div class="col-md-3 ">
                
                <div class="card bg-light"> <span class='icon'><img class="icon-src img-fluid" 
                src="https://img.icons8.com/emoji/96/000000/sun-emoji.png" /></span>
                    <div class="title">
                        <p class='cityName'></p>
                    </div>
                    <div class="temp"><sup>&deg;</sup></div>
                    <div class="row">
                        <div class="col-6">
                            <div >Weather</div>
                            <div class="general">Sunny</div>
                        </div>
                        <div class="col-6">
                            <div>Humidity</div>
                            <div class="humidity"></div>
                        </div>
                    </div>
                </div>

                <div class="card bg-light">
                    <p class="quote">

                    </p>
                </div>

            </div>   
            
</div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        const temperature = document.querySelector('.temp')
        const cityName = document.querySelector('.cityName')
        const humidity = document.querySelector('.humidity')
        const general = document.querySelector('.general')
        const airPollution = document.querySelector('.airPolution')
        const weatherIcon = document.querySelector('.icon-src')
        const discription = document.querySelector('.discription')

        const quote = document.querySelector('.quote')
        
        
        const API_KEY = '8542e44c9d5fe6fcd5ed9d628cfc11a1'
        const CITY_NAME = 'siedlce'

        const apiSite = 'https://api.openweathermap.org/data/2.5/weather?q=' + CITY_NAME
        
        const key = '&appid=' + API_KEY  
        const metrics = '&units=metric'

        
        async function showInfo() {
            const response = await axios.get(apiSite + key + metrics)

            temperature.textContent = Math.round(response.data.main.temp) +'º'
            cityName.textContent = response.data.name
            humidity.textContent = response.data.main.humidity + '%'
            general.textContent = response.data.weather[0].description

            const weather = response.data.weather[0].main
            switch (weather){
                case 'Cloudy':
                    weatherIcon.setAttribute('src', 'https://img.icons8.com/office/80/000000/partly-cloudy-day.png')
                    break;
                case 'Clear' || 'Sunny':
                    weatherIcon.setAttribute('src', 'https://img.icons8.com/emoji/96/000000/sun-emoji.png')
                    break;
                case 'Rain':
                    weatherIcon.setAttribute('src', 'https://img.icons8.com/external-vitaliy-gorbachev-lineal-color-vitaly-gorbachev/50/000000/external-rain-weather-vitaliy-gorbachev-lineal-color-vitaly-gorbachev-1.png')
                    break;
                case 'Snow':
                    weatherIcon.setAttribute('src', 'https://img.icons8.com/external-vitaliy-gorbachev-lineal-color-vitaly-gorbachev/50/000000/external-snowflake-weather-vitaliy-gorbachev-lineal-color-vitaly-gorbachev.png')
                    break;
                case 'Drizzle':
                    weatherIcon.setAttribute('src', 'https://img.icons8.com/external-tulpahn-outline-color-tulpahn/50/000000/external-drizzle-weather-tulpahn-outline-color-tulpahn.png')
                    break;
                case 'Thunderstorm':
                    weatherIcon.setAttribute('src', 'https://img.icons8.com/external-vitaliy-gorbachev-lineal-color-vitaly-gorbachev/50/000000/external-thunderstorm-weather-vitaliy-gorbachev-lineal-color-vitaly-gorbachev-4.png')
                    break;
                
            }

        }

        async function randomQuote() {
            const response = await axios.get('https://api.quotable.io/random')
            console.log(response);
            quote.textContent = '"' + response.data.content + '" - ' + response.data.author 
        }





        showInfo()
        randomQuote()


    </script>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>


</body>

</html>