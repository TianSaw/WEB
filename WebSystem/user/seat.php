<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ticket Booking</title>
    <!--Google Fonts and Icons-->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" type="text/css" href="seat.css">
   
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <div class="center">
        <div class="tickets">
            <div class="ticket-selector">
                <div class="head">
                    <div class="title">Event Seat</div>
                </div>
                <div class="seats">
                    <div class="status">
                        <div class="item">Available</div>
                        <div class="item">Booked</div>
                        <div class="item">Selected</div>
                    </div>
                    <div class="all-seats">
                        <?php
                        for ($i = 0; $i < 59; $i++) {
                            $randint = rand(0, 1);
                            $booked = $randint == 1 ? "booked" : "";
                            echo '<input type="checkbox" name="tickets" id="s' . ($i + 2) . '" ' . ($booked ? 'disabled' : '') . '/><label for="s' . ($i + 2) . '" class="seat ' . $booked . '"></label>';
                        }
                        ?>
                    </div>
                </div>
                <div class="timings">
                    <div class="dates">
                        <?php
                        $days = array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
                        for ($i = 0; $i < 7; $i++) {
                            echo '<input type="radio" name="date" id="d' . ($i + 1) . '" ' . ($i == 0 ? 'checked' : '') . '/><label for="d' . ($i + 1) . '" class="dates-item"><div class="day">' . $days[$i] . '</div><div class="date">' . ($i + 11) . '</div></label>';
                        }
                        ?>
                    </div>
                    <div class="times">
                        <input type="radio" name="time" id="t1" checked />
                        <label for="t1" class="time">11:00</label>
                        <input type="radio" id="t2" name="time" />
                        <label for="t2" class="time"> 14:30 </label>
                        <input type="radio" id="t3" name="time" />
                        <label for="t3" class="time"> 18:00 </label>
                        <input type="radio" id="t4" name="time" />
                        <label for="t4" class="time"> 21:30 </label>
                    </div>
                </div>
            </div>
            <div class="price">
                <div class="total">
                    <span> <span class="count">0</span> Tickets </span>
                    <div class="amount">0</div>
                </div>
                <button type="button" onclick="document.location='payment.php'">Book</button>
                
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkboxes = document.querySelectorAll('.all-seats input[type="checkbox"]');
            const amountDisplay = document.querySelector('.amount');
            const countDisplay = document.querySelector('.count');
            const bookButton = document.querySelector('button');

            let selectedSeatsCount = 0;

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', () => {
                    if (checkbox.checked) {
                        selectedSeatsCount++;
                    } else {
                        selectedSeatsCount--;
                    }

                    const ticketPrice = selectedSeatsCount * 200;
                    amountDisplay.textContent = ticketPrice;
                    countDisplay.textContent = selectedSeatsCount;
                });
            });

            bookButton.addEventListener('click', () => {
                alert(`You have booked ${selectedSeatsCount} tickets for a total of $${selectedSeatsCount * 200}`);
                // You can also submit the form or perform other actions here
            });
        });
    </script>
</body>
</html>


<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $selectedSeats = $_POST["tickets"]; // Assuming you have named your checkboxes as "tickets" in HTML

    // Validate and sanitize the data if necessary

    // Connect to your database
    $servername = "localhost";
    $username = "username"; // Change to your database username
    $password = "password"; // Change to your database password
    $dbname = "your_database"; // Change to your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the booking information into the database
    // Example: Inserting into a bookings table
    $sql = "INSERT INTO bookings (seat_number) VALUES ('$selectedSeats')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
