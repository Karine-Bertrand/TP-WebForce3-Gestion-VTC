  UPDATE conducteur SET prenom = :prenom, nom = :nom WHERE id_conducteur = :id;
 DELETE FROM conducteur WHERE id_conducteur=$id;


  UPDATE vehicule SET marque = :marque, modele = :modele, couleur = :couleur, immatriculation= :immatriculation
  WHERE id_vehicule = :id;
   DELETE FROM vehicule WHERE id_vehicule=$id;


  UPDATE assocation_vehicule_conducteur SET id_vehicule = :id_vehicule, id_conducteur = :id_conducteur WHERE id_association = :id;
 DELETE FROM assocation_vehicule_conducteur WHERE id_association=$id;

