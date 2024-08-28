<?php
// Database connection eka
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lecture_panel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$Caregivers_sql = "SELECT * FROM Caregivers";
$Caregivers_result = $conn->query($Caregivers_sql);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

@import url('https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:wght@400;700&display=swap');

body {
    font-family: 'Roboto', sans-serif;
}

.section_subheader::after {
    position: absolute;
    content: "";
    top: 50%;
    transform: translate(1rem, -50%);
    height: 2px;
    width: 4rem;
    /* background-color: var(--primary-color); */
}

.section_header {
    max-width: 600px;
    margin-bottom: 1rem;
    font-size: 2.5rem;
    font-weight: 600;
    line-height: 3rem;
    color: var(--text-dark);
    position: relative;
    text-transform: uppercase;
}

.section_header::before {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 50px;
    height: 4px;
    background-color: var(--primary-color);
}



/*Caregiver Panel Css */
.Care_giver {
            margin: 50px 0;
            padding: 20px;
            background: white;
            border-radius: 12px;
            width: 100%;
            position: relative;
        }

        .Care_table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-family: 'Roboto', sans-serif;
        }

        .Care_table th, .Care_table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        .Care_table th {
            background: linear-gradient(135deg, #0a7185, #0fa6c4);
            color: white;
            font-size: 1.2em;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .Care_table td {
            background: #f9f9f9;
            position: relative;
        }

        .Care_table tr:hover td {
            background-color: #0fa6c4;
        }

        .Care_image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid black;
            transition: transform 0.3s ease-in-out, border-color 0.3s ease-in-out;
            display: block;
            margin: 0 auto;
        }

        .Care_image:hover {
            transform: scale(1.1);
            border-color: orange;
        }

        @media (max-width: 768px) {
            .Care_table th, .Care_table td {
                padding: 10px;
            }

            .Care_image {
                width: 80px;
                height: 80px;
            }
        }

        @media (max-width: 768px) {
            .Care_table th, .Care_table td {
                display: block;
                width: 100%;
                text-align: center;
                border-bottom: none;
                padding: 10px 5px;
            }

            .Care_table th {
                background: none;
                color: #7bbffe;
            }

            .Care_table td {
                background: none;
            }

            .Care_table tr {
                border: 1px solid #ddd;
                border-radius: 12px;
                margin-bottom: 10px;
                overflow: hidden;
            }

            .Care_image {
                width: 70px;
                height: 70px;
            }
        }

        .hire_button {
            padding: 10px 20px;
            background-color: #0a7185;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .hire_button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .hire_button:hover:not(:disabled) {
            background-color: Black;
        }

/* Modal Css */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.6);
    animation: fadeIn 0.5s;
}

.modal-content {
    background-color: #0a7185;
    margin: 10% auto;
    padding: 30px;
    border: 1px solid #888;
    width: 80%;
    max-width: 500px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    animation: slideIn 0.5s;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideIn {
    from { transform: translateY(-50px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
    transition: color 0.3s;
}

.confirmation-message {
    margin: 20px 0;
    font-size: 1.2em;
    text-align: center;
    color: Black;
    line-height: 1.5;
}

.success-message {
    display: none;
    margin: 20px 0;
    padding: 15px;
    background-color: #4CAF50;
    color: white;
    text-align: center;
    border-radius: 5px;
    font-size: 1.1em;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.btn-container {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.btn {
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s, transform 0.3s;
}

.btn.cancel {
    background-color: Orange;
}

.btn:hover {
    background-color: #45a049;
    transform: scale(1.05);
}

.btn.cancel:hover {
    background-color: #e53935;
    transform: scale(1.05);
}
</style>
</head>
<body>

<!-- Find Care Giver -->
<section class="section_container Care_giver">
    <h2 class="section_header">Find a Care</h2>
    <p class="section_subheader"> Personalized care solutions connecting you with trusted professionals for home assistance, medical care, and more, ensuring your needs are met with compassion and reliability.
</p><br>
    <table class="Care_table">
        <thead>
            <tr>
                <th>Profile Picture</th>
                <!--<th>ID</th>-->
                <th>Name</th>
                <th>Expertise</th>
                <th>Description</th>
                <th>Availability</th>
                <th>Hire</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($Caregivers_result->num_rows > 0) {
                while($row = $Caregivers_result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><img src="images/' . $row["image"] . '" alt="' . $row["name"] . '" class="Care_image"></td>';
                    //echo '<td>' . $row["id"] . '</td>';
                    echo '<td>' . $row["name"] . '</td>';
                    echo '<td>' . $row["expertise"] . '</td>';
                    echo '<td>' . $row["description"] . '</td>';
                    echo '<td>' . $row["availability"] . '</td>';
                    echo '<td>';
                    if ($row["availability"] === 'Available') {
                        echo '<button class="hire_button" onclick="hireCaregiver(' . $row["id"] . ')">Hire</button>';
                    } else {
                        echo '<button class="hire_button" disabled>Not Available</button>';
                    }
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo "<tr><td colspan='7'>No Care Giver available.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

<!-- Hire Caregiver Modal -->
<div id="hireModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeHireForm()">&times;</span>
        <h2>Hire Caregiver</h2>
        <div class="confirmation-message">
            <p>Are you sure you want to hire <span id="caregiverName"></span>?</p>
        </div>
        <form id="hireForm" action="hire.php" method="POST">
            <input type="hidden" id="caregiverId" name="caregiverId">
            <div class="btn-container">
                <button type="button" class="btn cancel" onclick="closeHireForm()">Cancel</button>
                <button type="submit" class="btn">Confirm</button>
            </div>
        </form>
    </div>
</div>

<script>
function hireCaregiver(id, name) {
    document.getElementById('caregiverId').value = id;
    document.getElementById('caregiverName').textContent = name;
    document.getElementById('hireModal').style.display = 'block';
}

function closeHireForm() {
    document.getElementById('hireModal').style.display = 'none';
}

window.onclick = function(event) {
    if (event.target == document.getElementById('hireModal')) {
        document.getElementById('hireModal').style.display = 'none';
    }
}
</script>

</body>
</html>

<?php
$conn->close();
?>