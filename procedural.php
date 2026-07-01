<?php
$categories = [
   0=> [
        "nom" => "categorie1",
        "code" => "006",
        "produits" =>[
           0=> ["nom" => "cafe","reference" => "001","quantite" => "5","prix" => "3000"],
           1=> ["nom" => "lait","reference" => "002","quantite" => "6","prix" => "2000"]
        ]
    ],
    1=> [
        "nom" => "categorie2",
        "code" => "007",
        "produits" =>[]
    ]
];
function afficherCategoriesSansProduits(array $categories):void{
   
    foreach($categories as $categorie){
     if(count($categorie['produits']) === 0){
            echo $categorie['nom']."\n";
      }
    }
}

afficherCategoriesSansProduits($categories);

function saisirCodeCategories(array $categories) : string {
    $codeValide = false;
    do {
        $code = readline("Code:");
        $codeValide = true;
        foreach($categories as $categorie){
            if($categorie['code'] == $code){
                echo "Code deja existe!\n";
                $codeValide = false;
            }
        }
    } while($codeValide == false);
    return $code;
}

function saisirNomCategories(array $categories) : string {
    $nomValide = false;
    do {
        $nom = readline("Nom : ");
        $nomValide = true;
        foreach($categories as $categorie){
            if($categorie['nom'] == $nom){
                echo "Nom deja existe !\n";
                $nomValide = false;
            }
        }
    } while($nomValide == false);
    return $nom;
}

function creerCategorie(array $categories) : array {
    $code = saisirCodeCategories($categories);
    $nom = saisirNomCategories($categories);
    $categories[] = [
        'nom' => $nom,
        'code' => $code,
        'produits' => []
    ];
    echo "Categorie creee !\n";
    return $categories;
}
$categories = creerCategorie($categories);

function chercherCategorieParCode(array $categories) : int {
    $categorieExiste = false;
    do {
        $codeCategorie = readline("Code de categorie : ");
        foreach($categories as $index => $categorie){
            if($categorie['code'] == $codeCategorie){
                $categorieExiste = true;
                $categorieIndex = $index;
            }
        }
        if($categorieExiste == false){
            echo "Categorie nexiste pas !\n";}
    }while($categorieExiste == false);
    return $categorieIndex;
}

function ajouterProduit(array $categories) : array {
    $categorieIndex = chercherCategorieParCode($categories);
    
    $nomDuProduit = readline("nom produit : ");
    $referenceDuProduit = readline("reference : ");
    $prixDuProduit = readline("prix : ");
    $quantiteDuProduit = readline("quantite : ");
    $produit = [
        'nom' => $nomDuProduit,
        'reference' => $referenceDuProduit,
          'prix' => $prixDuProduit,
        'quantite' => $quantiteDuProduit
      ];

    $categories[$categorieIndex]['produits'][] = $produit;
    echo "Produit ajouter!\n";
    return $categories;
}

$categories = ajouterProduit($categories);