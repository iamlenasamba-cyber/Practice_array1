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

function demanderNomCategorieUnique(array $categories): string {
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

    return $nom;
}

function demanderCodeCategorieUnique(array $categories): string {
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

    return $code;
}

function demanderProduit(array $produits): array {
    do {
        $nomIsValid = true;
        $nomP = readline("nom du produit : ");
        if (empty($nomP)) {
            echo "nom obligatoire\n";
            $nomIsValid = false;
        } else {
            foreach ($produits as $produit) {
                if ($produit["nom"] === $nomP) {
                    echo "le nom du produit existe deja\n";
                    $nomIsValid = false;
                    break;
                }
            }
        }
    } while (!$nomIsValid);

    do {
        $ref = readline("la reference : ");
        if (empty($ref)) {
            echo "reference obligatoire\n";
        }
    } while (empty($ref));

    do {
        $prix = (int)readline("le prix : ");
        if ($prix <= 0) {
            echo "prix invalide\n";
        }
    } while ($prix <= 0);

    do {
        $qte = (int)readline("la quantite: ");
        if ($qte <= 0) {
            echo "quantite invalide\n";
        }
    } while ($qte <= 0);

    return [
        "nom" => $nomP,
        "reference" => $ref,
        "prix" => $prix,
        "quantite" => $qte,
    ];
}

function ajouterCategorie(array &$categories, string $nom, string $code, array $produits = []): void {
    $categories[] = [
        "code" => $code,
        "nom" => $nom,
        "produits" => $produits,
    ];
}

// question 2


foreach($categories as $categorie){
    if($categorie["produits"]==[]){
        print_r ($categorie);
        echo PHP_EOL;
    }
};

// question 3
$nom = demanderNomCategorieUnique($categories);
$code = demanderCodeCategorieUnique($categories);

ajouterCategorie($categories, $nom, $code);

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
    $produit = demanderProduit($categories[$key]["produits"]);
    $categories[$key]["produits"][] = $produit;
} else {
    echo "la categorie n'existe pas.";
}
// question 5

$produits = [];
$nom = demanderNomCategorieUnique($categories);
$code = demanderCodeCategorieUnique($categories);

do {
    $produits[] = demanderProduit($produits);
    $choix = strtolower(readline(" voulez vous continuer oui/non "));
} while ($choix === "oui");

ajouterCategorie($categories, $nom, $code, $produits);