<?php
    include "./component/navbar.php";
    $sql = "SELECT * FROM users";

        $result = mysqli_query($conn, $sql);

        $response = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $response[] = $row;
            }
        }
?>
<style>
.horizontal-header th {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    max-width: 200px;
    text-align: center;
    /* ปรับขนาดตามความเหมาะสม */
}
</style>

<body class="bodyt">
    <div class="bgC">
    </div>
    <div class="contentnews">
        <div class="card bg-light text-dark" style="text-align: center;">
            <h1>Users</h1> <a href="?page=create-news">Add user</a>
        </div>
    </div>
    <div class="content">
        <div class="card bg-light text-dark" style="padding:10px;"><br>

            <table class="table table-hover" width="100%">
                <thead>
                    <tr class="horizontal-header th">
                        <th>ลำดับ</th>
                        <th>ชื่อผู้ใช้งาน</th>
                        <th>ชื่อจริง</th>
                        <th>นามสกุล</th>
                        <th>อีเมล</th>
                        <!-- <th>อายุ</th> -->
                        <th>โทรศัพท์</th>
                        <th>รูป</th>
                        <!-- <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ใช้งานล่าสุด&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </th> -->
                        <th>สิทธ์</th>
                        <th>การเปลี่ยนแปลง</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                        $num = 0;
                                        foreach ($response as $row) {
                                            $image = './public/imgusers/'.$row['picture'];
                                            $num++;
                                            echo "<tr>";
                                            echo "<td> {$num} </td>";
                                            echo "<td> {$row['username']} </td>";
                                            echo "<td> {$row['firstname']} </td>";
                                            echo "<td> {$row['lastname']} </td>";
                                            echo "<td> {$row['email']} </td>";
                                            echo "<td> {$row['tel']} </td>";
                                            ?>

                    <td>

                        <img src="<?php echo $image ?>" alt="" width="100px" height="100px">

                    </td>

                    <?php
                                            echo "<td> {$row['user_type']} </td>";
                                            // echo "<td> 
                                            //         <a href='form-edit.php?id={$row['Admin_id']}' type='button' class='btn btn-warning text-white'>
                                            //             <i class='far fa-edit'></i> แก้ไข
                                            //         </a>
                                            //         <button type='button' class='btn btn-danger delete-button' data-id='{$row['Admin_id']}' data-index='{$row['Admin_id']}' onclick='confirmDelete({$row['Admin_id']})'>
                                            //         <i class='far fa-trash-alt'></i> ลบ
                                            //     </button>
                                            //     </td>";
                                            echo "<td> 
                                                    <a href='#' type='button' class='btn btn-warning text-white'>
                                                        <i class='far fa-edit'></i> แก้ไข
                                                    </a>
                                                    <button type='button' class='btn btn-danger delete-button' >
                                                    <i class='far fa-trash-alt'></i> ลบ
                                                </button>
                                                </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                </tbody>
            </table>
        </div>
    </div>
</body>