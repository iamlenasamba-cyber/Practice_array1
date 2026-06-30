<?php

// array

$categories=[];
$categories=[
    0=>["nom"=>"alimentaire",
        "code"=>"1020",
        "produits"=>[
            0=> [
                "nom"=> "lait",
                "reference"=>"a2kv1",
                "qte"=>20,
                "prix"=>100
            ],
             1=> [
                "nom"=> "riz",
                "reference"=>"3hfT6",
                "qte"=>10,
                "prix"=>600
            ],
        ]
    ],
     1=>["nom"=>"hygiene",
        "code"=>"4568",
        "produits"=>[],
    ]
];

// question 2


foreach($categories as $categorie){
    if($categorie["produits"]==[]){
        print_r ($categorie);
        echo PHP_EOL;
    }
};

// question 3
 do {
    $nomIsValid = true;
    $nom = readline("nom : ");
    if (empty($nom)) {
        echo "nom obligatoire\n";
        $nomIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if ($categorie["nom"] == $nom) {
                $nomIsValid = false;
                echo "le nom existe deja\n";
                break;
            }
        }
    }
} while (!$nomIsValid);

do {
    $codeIsValid = true;
    $code = readline("code : ");
    if (empty($code)) {
        echo "code obligatoire\n";
        $codeIsValid = false;
    } else {
        foreach ($categories as $categorie) {
            if ($categorie["code"] == $code) {
                $codeIsValid = false;
                echo "le code existe deja\n";
                break;
            }
        }
    }
} while (!$codeIsValid);


    $categories[] =[
            "code" => $code,
            "nom" => $nom,
            "produits" => []
         ];
 
         print_r($categories);