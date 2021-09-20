var RegExpCourriel=/^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;
var RegExpMotPasse=/^[A-Za-z\d#_!-]{8,10}$/;

function validerFormulaireMembres(){

	var nom = document.getElementById("nom").value;
	var prenom = document.getElementById("prenom").value;
    var courriel=document.getElementById("courriel").value;
    var date_de_naissance = document.getElementById("date_de_naissance").value;
    var mot_de_passe = document.getElementById("mot_de_passe").value;
    var confirm_mot_de_passe = document.getElementById("confirm_mot_de_passe").value;
    var sexe_masculin = document.getElementById("sexeM").checked;
    var sexe_feminin = document.getElementById("sexeF").checked;
    var divMsgErreurs=document.getElementById("msgErreur");

    divMsgErreurs.innerHTML="";
    var etatFormulaire=true;

    if ( nom == "" || 
    	 prenom == "" || 
    	 courriel == "" || 
    	 date_de_naissance == "" || 
    	 mot_de_passe == "" || 
    	 confirm_mot_de_passe == "" || 
    	 (!sexe_masculin && !sexe_feminin)
    	) {
        divMsgErreurs.innerHTML = "<p>Vous devez remplir tous les champs du formulaire</p>";
        etatFormulaire=false;
    }else {
        if(!RegExpCourriel.test(courriel)){
            divMsgErreurs.innerHTML+="<p>Votre courriel est invalide !</p>";
            etatFormulaire=false;
        }
        if(!RegExpMotPasse.test(mot_de_passe)){
            divMsgErreurs.innerHTML+="<p>Votre mot de passe ne respecte pas nos consignes des mots de passe !</p>";
            etatFormulaire=false;
        }
        if(mot_de_passe != confirm_mot_de_passe){
            divMsgErreurs.innerHTML+="<p>La confirmation du mot de passe ne correspond pas au mot de passe tapé !</p>";
            etatFormulaire=false;
        }
    }

    return etatFormulaire;
}

function validerFormulaireConnexion(){
    var courriel=document.getElementById("courriel").value;
    var mot_de_passe = document.getElementById("mot_de_passe").value;
    var divMsgErreurs=document.getElementById("msgErreur");

    divMsgErreurs.innerHTML="";
    var etatFormulaire=true;

    if ( courriel == "" || mot_de_passe == "") {
        divMsgErreurs.innerHTML = "<p>Vous devez remplir tous les champs du formulaire</p>";
        etatFormulaire=false;
    }else {
        if(!RegExpCourriel.test(courriel)){
            divMsgErreurs.innerHTML+="<p>Votre courriel est invalide !</p>";
            etatFormulaire=false;
        }
        if(!RegExpMotPasse.test(mot_de_passe)){
            divMsgErreurs.innerHTML+="<p>Votre mot de passe ne respecte pas nos consignes des mots de passe !</p>";
            etatFormulaire=false;
        }
    }
    return etatFormulaire;
}