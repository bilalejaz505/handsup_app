<!DOCTYPE html>
<html>
<head>
    <title>BMS Larkana Marksheet</title>
    <!--<link href="https://fonts.googleapis.com/css?family=Acme|Cabin+Condensed|Poppins" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/style.css">
</head>
<body>
<div class="wrapper">
    <div class="logo">
        <img src="<?php echo base_url(); ?>assets/logo.jpg" width="200" height="200">
    </div>
    <div class="heading">
        <h1>Bright Model School Larkana</h1>
        <h2>Muhalla Ghalib Nagar Larkana Sindh Pakistan</h2>
    </div>

    <div class="headings-two">
        <h2><i>Report Card</i></h2>
        <h2><i>Class <?php echo $class_info['numeric_name']; ?>-<?php echo $class_info['section']; ?></i></h2>
        <p>Dated: 22-05-2017</p>
    </div>
    <div class="student-info">
        <table>
            <thead>
            <tr>
                <th colspan="2">Student Profile</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Name</td>
                <td><?php echo $student_info['fname'].' '.$student_info['lname']; ?></td>
            </tr>
            <tr>
                <td>Father's Name</td>
                <td>Kareem Bux</td>
            </tr>
            <tr>
                <td>Roll Number</td>
                <td>10</td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td>20-05-1989</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>Muhalla Ghalib Nagar Larkana</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="marks-info">
        <table>
            <thead>
            <tr>
                <th>Subject Name</th>
                <th>Total Marks</th>
                <th>Obtained Marks</th>
                <th>Result</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 0;
            foreach ($subject_name as $subject)
            { ?>
                <tr>
                    <td><?php echo $subject; ?></td>
                    <td><?php echo $subject_total_marks[$i]; ?></td>
                    <td><?php echo $subject_obtained_marks[$i]; ?></td>
                    <td>PASS</td>
                </tr>
            <?php $i++; } ?>

            <tr>
                <td colspan="3">Total Marks</td>
                <td><strong><?php echo $total_marks; ?></strong></td>
            </tr>
            <tr>
                <td colspan="3">Total Marks Taken</td>
                <td><strong><?php echo $total_obtained_marks; ?></strong></td>
            </tr>
            <tr>
                <td colspan="3">Percentage</td>
                <td><strong><?php echo $percentage; ?>%</strong></td>
            </tr>
            <tr>
                <td colspan="3">Grade</td>
                <td><strong>A</strong></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="bottom-section">
        <h3>Date of Issue: <span>15-06-2017</span></h3>
        <div class="sign">
            <h4>Principal</h4>
        </div>
    </div>
</div>
</body>
</html>