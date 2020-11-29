<?php
include_once "config.php";
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$connection) {
    throw new Exception("Can't connect database");
}

$query = "SELECT * FROM tasks WHERE complete = 0 ORDER BY date";
$result = mysqli_query($connection, $query);

$completeTaskQuery = "SELECT * FROM tasks WHERE complete = 1 ORDER BY date";
$resultCompleteTask = mysqli_query($connection, $completeTaskQuery);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Todo/Tasks</title>
    <!-- <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css"> -->
    <link rel="stylesheet" href="milligram.min.css">
    <style>
        body {
            margin-top: 30px;
        }

        #main {
            padding: 0px 150px 0px 150px;
        }

        #action {
            width: 150px;
        }
    </style>
</head>

<body>

    <div class="container" id="main">
        <h1>Tasks Manager</h1>
        <p>Created by @Arif Islam</p>

        <?php
        if (mysqli_num_rows($resultCompleteTask) > 0) {
        ?>
            <h4>Complete Tasks</h4>

            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Task</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($cdata = mysqli_fetch_assoc($resultCompleteTask)) {
                        $timestapm = strtotime($cdata["date"]);
                        $cdate = date("jS M, Y", $timestapm);
                    ?>
                        <tr>
                            <td><input class="label-inline" type="checkbox" value="<?php echo $cdata["id"]; ?>"></td>
                            <td><?php echo $cdata["id"]; ?></td>
                            <td><?php echo $cdata["task"]; ?></td>
                            <td><?php echo $cdate; ?></td>
                            <td><a class="delete" data-taskid="<?php echo $cdata['id'] ?>" href='#'>Delete</a> | <a class="incomplete" data-taskid="<?php echo $cdata["id"]; ?>" href='#'>Mark as Incomplete</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
                </tbody>
            </table>

            <h4>Upcoming Tasks</h4>
            <?php
            if (mysqli_num_rows($result) == 0) {
            ?>
                <p>No Ddata found !</p>
            <?php
            } else { ?>
                <form action="task.php" method="POST">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Task</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_assoc($result)) {

                                $timestapm = strtotime($data["date"]);
                                $date = date("jS M, Y", $timestapm);
                            ?>
                                <tr>
                                    <td><input name="taskids[]" class="label-inline" type="checkbox" value="<?php echo $data["id"]; ?>"></td>
                                    <td><?php echo $data["id"]; ?></td>
                                    <td><?php echo $data["task"]; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><a class="delete" data-taskid="<?php echo $data['id'] ?>" href='#'>Delete</a> | <a class="complete" data-taskid="<?php echo $data["id"]; ?>" href='#'>Complete</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <select id="action" name="action">
                        <option value="0">With Selected</option>
                        <option value="bulkdelete">Delete</option>
                        <option value="bulkcomplete">Mark As Complete</option>
                    </select>
                    <input id="bulksubmit" class="button-primary" type="submit">

                </form>
            <?php } ?>
            <h4>Add Tasks</h4>
            <form method="post" action="task.php">
                <fieldset>
                    <?php
                    $added = $_GET["added"] ?? "";
                    if ($added) {
                        echo "<p>Task Added Susscessfully <p/>";
                    }
                    ?>

                    <label for="task">Task</label>
                    <input type="text" placeholder="Task Details" id="task" name="task">
                    <label for="date">Date</label>
                    <input type="text" placeholder="Task Date" id="date" name="date">

                    <input class="button-primary" type="submit" value="Add Task">
                    <input type="hidden" name="action" value="add">
                </fieldset>
            </form>
    </div>


    <form action="task.php" method="post" id="completeform">
        <input type="hidden" name="action" value="complete">
        <input type="hidden" id="ctaskid" name="taskid">
    </form>

    <form action="task.php" method="post" id="incompleteform">
        <input type="hidden" name="action" value="incomplete">
        <input type="hidden" id="itaskid" name="taskid">
    </form>

    <form action="task.php" method="post" id="deleteform">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" id="dtaskid" name="taskid">
    </form>


    <script src="jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".complete").on("click", function() {
                var id = $(this).data("taskid");
                $("#ctaskid").val(id);
                $("#completeform").submit();
            });

            $(".incomplete").on("click", function() {
                var id = $(this).data("taskid");
                $("#itaskid").val(id);
                $("#incompleteform").submit();
            });

            $(".delete").on('click', function() {
                if (confirm("Are you sure to delete this task ?")) {
                    var id = $(this).data("taskid");
                    $("#dtaskid").val(id);
                    $("#deleteform").submit();
                }
            });

            $("#bulksubmit").on("click", function() {
                if ($("#action").val() == 'bulkdelete') {
                    if (!confirm("Are you sure to delete?")) {
                        return false;
                    }
                }
            });
        });
    </script>
</body>

</html>