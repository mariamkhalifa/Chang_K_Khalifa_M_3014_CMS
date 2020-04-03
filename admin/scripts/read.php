<?php

function getAll($tbl){
    $pdo = Database::getInstance()->getConnection();

    $queryAll = 'SELECT * FROM '.$tbl;
    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    }else{
        return 'There was a problem accessing the info';
    }
};

function getSingleProduct($tbl, $col, $id) {
    //make sure it returns only one movie that is filtered by $col = $id
    $pdo = Database::getInstance()->getConnection();

    $queryOne = 'SELECT * FROM '. $tbl .' WHERE '.$col. ' = '.$id;
    $results = $pdo->query($queryOne);

    // echo $queryOne;
    // exit;

    if($results){
        return $results;
    }else{
        return 'There was a problem accessing the info';
    }
}

function getProductsByFilter($args){
    $pdo = Database::getInstance()->getConnection();

    $queryAll = 'SELECT * FROM '. $args['tbl'].' AS t,';
    $queryAll .= ' '. $args['tbl2'].' AS t2,';
    $queryAll .= ' '. $args['tbl3'].' AS t3';
    $queryAll .= ' WHERE t.'. $args['col'].' = t3.'.$args['col'];
    $queryAll .= ' AND t2.'. $args['col2'].' = t3.'.$args['col2'];
    $queryAll .= ' AND t2.'. $args['col3'].' = "'.$args['filter'].'"';

    // echo $queryAll;
    // exit;

    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    }else{
        return 'There was a problem accessing the info';
    }
}

function getProductsBySearch($args){
    $pdo = Database::getInstance()->getConnection();

    $queryAll = 'SELECT * FROM '. $args['tbl'].' AS t,';
    $queryAll .= ' '. $args['tbl2'].' AS t2,';
    $queryAll .= ' '. $args['tbl3'].' AS t3';
    $queryAll .= ' WHERE t.'. $args['col'].' = t3.'.$args['col'];
    $queryAll .= ' AND t2.'. $args['col2'].' = t3.'.$args['col2'];
    $queryAll .= ' AND t2.'. $args['col3'].' LIKE :search';

    $get_results = $pdo->prepare($queryAll);
    $results = $get_results->execute(
        array(
            ':search'=>'%'.$args['search'].'%'
        )
    );
    
    if($results && $get_results->rowCount() > 0){
        return $get_results;
    }else{
        return false;
    }
}