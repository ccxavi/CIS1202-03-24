<?php
$name = isset($_POST["name"]) ? $_POST["name"] : null;
$relationship = isset($_POST["relationship"]) ? $_POST["relationship"] : null;
$contact = isset($_POST["contact"]) ? $_POST["contact"] : null;
$patient_name = isset($_POST["patient_name"]) ? $_POST["patient_name"] : null;
$date = isset($_POST["date"]) ? $_POST["date"] : null;
$time = isset($_POST["time"]) ? $_POST["time"] : null;

function displayEmergencyContact($name, $relationship, $contact) {
    if (!empty($name) && !empty($relationship) && is_numeric($contact)) {
        return "In case of emergency, please contact $name ($relationship) at $contact.";
    }
    return "Invalid details. Please check your input.";
}

function displayOnlineAppointmentBooking($patient_name, $date, $time) {
    $currDate = date("Y-m-d");
    if (!empty($patient_name) && !empty($date) && $date >= $currDate && !empty($time)) {
        return "Appointment booked for $patient_name on $date at $time.";
    }
    return "Invalid appointment details. Please check your input.";
}

$emergencyContact_summary = (!is_null($name) || !is_null($relationship) || !is_null($contact)) ? displayEmergencyContact($name, $relationship, $contact) : null;
$appointment_message = (!is_null($patient_name) || !is_null($date) || !is_null($time)) ? displayOnlineAppointmentBooking($patient_name, $date, $time) : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIS1202-03-24 | Villarin</title>
    <link rel="stylesheet" href="./styles/global.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
</head>
<body>
    <main class="container-fluid d-flex justify-content-center align-items-center vh-100">
        <div class="card w-100 p-4 card-color shadow-lg" style="max-width: 1000px">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <div class="pic"></div>
                        <div>
                            <h3 class="mb-1">Czachary Xavier Villarin</h3>
                            <p class="mb-0 text-muted">CIS 1202 - <i>Web Development I</i> | BSCS 1</p>
                        </div>
                    </div>
                    <h3 class="mb-0">CIS1202-03-24_Villarin</h3>
                </div>
                <hr class="mt-3 mb-0" />
            </div>
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="d-flex gap-4">
                <div class="card card-color p-4 shadow-sm flex-fill" style="max-width: 50%">
                    <h4><i class="bi bi-telephone-fill"></i> | Emergency Contact Form</h4>
                    <hr class="mt-2" />
                    <form method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="relationship" class="form-label">Status</label>
                            <select class="form-control" name="relationship" id="relationship" required>
                                <option selected></option>
                                <option value="Father">Father</option>
                                <option value="Mother">Mother</option>
                                <option value="Guardian">Guardian</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact:</label>
                            <input type="number" name="contact" id="contact" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
                
                <div class="card card-color p-4 shadow-sm flex-fill" style="max-width: 50%">
                    <h4><i class="bi bi-journal-bookmark-fill"></i> | Online Appointment Booking</h4>
                    <hr class="mt-2" />
                    <form method="POST">
                        <div class="mb-3">
                            <label for="patient_name" class="form-label">Name:</label>
                            <input type="text" name="patient_name" id="patient_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date:</label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Time:</label>
                            <input type="time" name="time" id="time" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Book Appointment</button>
                    </form>
                </div>
                </div>
                <div class="mt-4">
                    <?php if ($emergencyContact_summary !== null): ?>
                        <div class="alert alert-info text-center m-0">
                            <i class="bi bi-telephone-fill"></i> | <strong><?php echo $emergencyContact_summary; ?></strong>
                        </div>
                    <?php endif; ?>
                    <?php if ($appointment_message !== null): ?>
                        <div class="alert alert-info text-center m-0">
                            <i class="bi bi-journal-bookmark-fill"></i> | <strong><?php echo $appointment_message; ?></strong>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-footer text-center">
                <hr class="m-0"/>
                <p class="text-muted mt-3">© 2025, Czach Villarin. All Rights Reserved.</p>
            </div>
        </div>
    </main>
</body>
</html>
