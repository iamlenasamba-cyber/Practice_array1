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
                        echo "le code existe deja ...\n";
                        break;
                    }
                }
            }
        } while (!$codeIsValid);

$categories[] = [
    "code" => $code,
    "nom" => $nom,
    "produits" => []
];

print_r($categories);

// question 4

 $categorieExiste =  false;
          $code = readline("saisir le code :");
             foreach ($categories as $key => $categorie ) {
               if (($categorie["code"]) === $code) {
                    $categorieExiste = true;
                    break;
         }
       } 

if ($categorieExiste) {
    do {
        $nomIsValid = true;
        $nomP = readline("nom du produit : ");
        if (empty($nomP)) {
            echo "nom obligatoire\n";
            $nomIsValid = false;
            continue;
        }

        foreach ($categories[$key]["produits"] as $produit) {
            if ($produit["nom"] === $nomP) {
                echo "le nom du produit existe deja\n";
                $nomIsValid = false;
                break;
            }
        }

        if (!$nomIsValid) {
            continue;
        }

        $ref = readline("la reference : ");
        if (empty($ref)) {
            echo "reference obligatoire\n";
            $nomIsValid = false;
            continue;
        }

        $prix = (int)readline("le prix : ");
        if ($prix <= 0) {
            echo "prix invalide\n";
            $nomIsValid = false;
            continue;
        }

        $qte = (int)readline("la quantite: ");
        if ($qte <= 0) {
            echo "quantite invalide\n";
            $nomIsValid = false;
            continue;
        }
    } while (!$nomIsValid);

    $produit = [
        "nom" => $nomP,
        "reference" => $ref,
        "prix" => $prix,
        "quantite" => $qte
    ];

    $categories[$key]["produits"][] = $produit;
} else {
    echo "la categorie n'existe pas.";
}
// question 5

$produits = [];

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
                        echo "le code existe deja ...\n";
                        break;
                    }
                }
            }
        } while (!$codeIsValid);

$categories[] = [
    "code" => $code,
    "nom" => $nom,
    "produits" => []
];

do{
    do {
        $nomIsValid = true;
        $nomP = readline("nom du produit : ");
        if (empty($nomP)) {
            echo "nom obligatoire\n";
            $nomIsValid = false;
            continue;
        }

        foreach ($produits as $produit) {
            if ($produit["nom"] === $nomP) {
                echo "le nom du produit existe deja\n";
                $nomIsValid = false;
                break;
            }
        }

        if (!$nomIsValid) {
            continue;
        }

        $ref = readline("la reference : ");
        if (empty($ref)) {
            echo "reference obligatoire\n";
            $nomIsValid = false;
            continue;
        }

        $prix = (int)readline("le prix : ");
        if ($prix <= 0) {
            echo "prix invalide\n";
            $nomIsValid = false;
            continue;
        }

        $qte = (int)readline("la quantite: ");
        if ($qte <= 0) {
            echo "quantite invalide\n";
            $nomIsValid = false;
            continue;
        }
    } while (!$nomIsValid);

    $produit  = [
        "nom" => $nomP,
        "reference" => $ref,
        "prix" => $prix,
        "quantite" => $qte
    ];

        $produits[]= $produit;
    $choix = strtolower(readline(" voulez vous continuer  oui/non "));
     } while ($choix === "oui");
      $categorie  =   [
            "code" => $code,
            "nom" => $nom,
            "produits" =>  $produits 
         ];

         $categories[] = $categorie;