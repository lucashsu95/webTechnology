<?php
include('link.php');
// $data = json_decode(file_get_contents('php://input'));
switch ($_GET['do']){
    
    case 'setTemplate':
        
        $sql = 'select * from template';
        $query = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($query);
        break;

    case 'productMod':

        $sql = $db->prepare('insert into product(name,udesc,price,link,image,date,template_id) values(:name,:udesc,:price,:link,:image,:date,:template_id)');
        
        $fileName = date('YmdHis');
        $pathOfFile = "img/{$fileName}.jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], $pathOfFile);
        $sql->bindValue('image',$pathOfFile);

        if(@$_POST['id']){
            $sql = $db->prepare('update product set name=:name,udesc=:udesc,price=:price,link=:link,date=:date,template_id=:template_id where id=:id');
            $sql->bindValue('id',$_POST['id']);
            
            if($_FILES['image']){
                $sql3 = $db->prepare('update product set image=:image where id=:id');
                $sql3->bindValue('id',$_POST['id']);
                $sql3->bindValue('image',$pathOfFile);
                $sql3->execute();
            }
        }

        // file_put_contents($pathOfFile,$data['image']);
        $sql2 = 'select * from template';
        $template = $db->query($sql2)->fetchAll();
        $template_id = $template[$_POST['template_id']]['id'];

        $sql->bindValue('name',$_POST['name']);
        $sql->bindValue('udesc',$_POST['udesc']);
        $sql->bindValue('price',$_POST['price']);
        $sql->bindValue('link',$_POST['link']);
        $sql->bindValue('date',$_POST['date']);
        $sql->bindValue('template_id',$template_id);
        $sql->execute();

        break;
    case 'destroyProduct':

        $sql = 'delete from product where id=' . $_GET['id'];
        $query = $db->query($sql);
        header('location:./');
        break;

    case 'insertTemplate':

        $data = json_decode(file_get_contents('php://input'),true);
        // var_dump($data);
        $sql = $db->prepare('insert into template(layout,color) values(:layout,:color)');
        $sql->bindValue('layout',json_encode($data['template']));
        $sql->bindValue('color',$data['color']);
        $sql->execute();
        break;

    case 'modifyTemplate':

        $data = json_decode(file_get_contents('php://input'),true);
        $sql = $db->prepare('update template set layout=:layout,color=:color where id=:id');

        $sql->bindValue('id',$data['id']);
        $sql->bindValue('layout',json_encode($data['template']));
        $sql->bindValue('color',$data['color']);
        $sql->execute();
        break;
        
    case 'destroyTemplate':

        $id = $_GET['id'];
        // echo $id;
        $sql = "delete from template where id=$id";
        $query = $db->query($sql);
        header('location:template.html');   
        break;

}

?>