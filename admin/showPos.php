<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../static/css/bootstrap.min.css">
</head>
<body>

  <table class="table table-bordered">
      <tr>
            <th>
                id
            </th>
          <th>
              名称
          </th>
          <th>
              操作
          </th>
      </tr>

      <?php
        include "../public/db.php";
        $sql="select * from position";
        $result=$db->query($sql);
        while ($row=$result->fetch_assoc()) {
            ?>
            <tr>
                <td>
                    <?php
                      echo $row["posid"]
                    ?>
                </td>
                <td>
                    <?php
                      echo $row["posname"]
                    ?>
                </td>
                <td>
                    <a href="delPos.php?posid=<?php echo $row['posid'] ?>">
                        删除
                    </a>
                    <a href="">
                        编辑
                    </a>
                </td>
            </tr>
            <?php
      }
      ?>
  </table>
</body>
</html>