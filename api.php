<?php
include('link.php');
// $data = json_decode(file_get_contents('php://input'));
switch ($_GET['do']){
    case 'getValue':
        $sql = 'select * from template';
        $query = $db->query($sql)->fetchAll();
        if($query) echo json_encode($query);
        break;
    case 'insert':
        $sql = $db->prepare('insert into product(name,udesc,price,link,image,date,template_index) values(:name,:udesc,:price,:link,:image,:date,:template_index)');
        if(@$_POST['id']){
            $sql = $db->prepare('update product set name=:name,udesc=:udesc,price=:price,link=:link,image=:image,date=:date,template_index=:template_index where id=:id');
            $sql->bindValue('id',$_POST['id']);
        }
        
        // echo $data->image . '<br>';
        // echo "<img src={$data->image} alt='img'>" . '<br>';
        $data = json_decode($_POST['data']);
        $fileName = date('YmdHis');
        $pathOfFile = "img/$fileName";
        file_put_contents($pathOfFile,$data->image);
        
        $sql->bindValue('name',$data->name);
        $sql->bindValue('udesc',$data->udesc);
        $sql->bindValue('image',$pathOfFile);
        $sql->bindValue('price',$data->price);
        $sql->bindValue('link',$data->link);
        $sql->bindValue('date',$data->date);
        $sql->bindValue('template_index',$data->template_index);

        $sql->execute();
        echo "<script>alert('新增成功'),location.href='index.php'</script>";
        break;
    case 'insertTemplate':
        $template = json_decode($_POST['template']);
        $sql = $db->prepare('insert into template(one,two,three,four,fire,six) values(:one,:two,:three,:four,:fire,:six)');
        $sql->bindValue('one',$template[0]);
        $sql->bindValue('two',$template[1]);
        $sql->bindValue('three',$template[2]);
        $sql->bindValue('four',$template[3]);
        $sql->bindValue('fire',$template[4]);
        $sql->bindValue('six',$template[5]);
        $sql->execute();
        echo "<script>alert('新增成功'),location.href='index.php'</script>";
        break;
        // if(isset($_FILES['image']['error'])){
            // if($_FILES['image']['error'] == 0){
            //     $Lext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            //     $Lfile_name = "img/" . date("YmdHis") . "." . $Lext;
            //     copy($_FILES['image']['tmp_name'], $Lfile_name);
            //     $sql->bindValue('image',$Lfile_name);
            // }else if($_POST['id']){
            //     $sql = $db->prepare('update product set name=:name,udesc=:udesc,price=:price,link=:link,date=:date,template_index=:template_index where id=:id');
            //     $sql->bindValue('id',$_POST['id']);
            //     echo "_FILES['image']['error'] == 0";
            // }
        // }else{
        //     echo "_FILES['image']['error']";
        // }
}

?>