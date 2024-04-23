<?php
$con = mysqli_connect("localhost", "root", "", "blog");

if (!$con) {
    die('Connection Failed' . mysqli_connect_errno());
}

$query = "SELECT * FROM events";
$query_run = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="event.css">
    <link rel="stylesheet" type="text/css" href="header2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<?php
include('header2.php');
?>

<body>
    <div class="games">
        <h2>Popular Events</h2>
        <ul>
            <li class="list active" data-filter="all">All</li>
            <li class="list" data-filter="pc">Pc Games</li>
            <li class="list" data-filter="mobile">Mobile Games</li>
        </ul>
        <div class="cardBx">
            <?php
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $event) {
            ?>
                    <div class="card" data-item="pc">
                        <img src="event1.png">
                        <div class="content">
                            <h4><?php echo $event['name']; ?></h4>
                            <div class="progress-line"><span></span></div>
                            <div class="info">
                                <p>Venue :<br><span><?php echo $event['venue']; ?></span></p>
                                <a href="#">View More</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<h5> No Record Found </h5>";
            }
            ?>
        </div>
    </div>

    <script>
        window.addEventListener('scroll', function() {
            var header = document.querySelector('header');
            header.classList.toggle('sticky', window.scrollY > 0);
        });


        function toggleMenu() {
            const toggleMenu = document.querySelector('.toggleMenu');
            const nav = document.querySelector('.nav');
            toggleMenu.classList.toggle('active')
            nav.classList.toggle('ative')
        }

        let list = document.querySelectorAll('.list');
        let card = document.querySelectorAll('.card');

        for (let i = 0; i < list.length; i++) {
            list[i].addEventListener('click', function() {
                for (let j = 0; j < list.length; j++) {
                    list[j].classList.remove('active');
                }
                this.classList.add('active');

                let dataFilter = this.getAttribute('data-filter');

                for (let k = 0; k < card.length; k++) {
                    card[k].classList.remove('active');
                    card[k].classList.add('hide');

                    if (card[k].getAttribute('data-item') == dataFilter || dataFilter == 'all') {
                        card[k].classList.remove('hide');
                        card[k].classList.add('active');
                    }
                }
            })
        }
    </script>

</body>

</html>
