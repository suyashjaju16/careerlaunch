<?php 
$students_data = json_decode(fetch_data(API_STUDENTS_ENDPOINT,$data),true);
$is_pre_post = $data->filters->implementation_time === "prepost" ? true : false;
?>

<table id="datatable" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;" data-page-length='25'>
    <thead class="text-white" style="background-color: #000033;">
        <tr style="color:white!important">
            <!-- <th scope="col" style="width:20px">#</th> -->
            <th style="color:white!important">First Name </th>
            <th style="color:white!important">Last Name</th>
            <th style="color:white!important">Email</th>
            <?= $is_pre_post ? "<th style='color:white!important'>Type</th>" : "";?>
            <th style="color:white!important">Overall Score</th>
            <th style="color:white!important">Date</th>
            <th class="no-sort" style="width:20px;color:white!important">Report</th>
        </tr>
    </thead>

    <tbody>
        <?php 
                                    foreach ($students_data as $key => $values) {
                                        // echo $values["Id"]."<br>";
                                        $name = explode(" ",$values["Name"]);
                                    ?>
        <tr>
            <!-- <th scope="col" style="width:20px">1</th> -->
            <td> <?= $name[0] ?> </td>
            <td> <?= $name[1] ?> </td>
            <td> <?= $values["Email"] ?> </td>
            <?= $is_pre_post ? "<td>".ucfirst($values["type"])."</td>" : "";?>
            <td>
                <center> <?= round($values["Score"],0) ?> <center>
            </td>
            <td> <?= date_format(date_create($values["Time"]), "m/j/Y ") ?> </td>
            <td><center><a href='./student?id=<?= $values["Id"] ?>' target="_blank">
                    <i class='ri-share-box-fill' style='color:#000033;font-size:20px'></i>
                </a></center>
            </td>
        </tr>
        <?php 
                                    }
                                    ?>

    </tbody>
</table>