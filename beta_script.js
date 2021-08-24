/*
Détection du type de chaque mots
Cinq classes sont variables :
- le nom ---> Ne peut pas être déterminer (liste trop longue)
- le déterminant --> reg_determinant
- l'adjectif qualificatif ---> liste trop longue
- le pronom ---> Reg_pronom
- le verbe ---> Listing finale
Quatre classes sont invariables :
- l'adverbe
- la préposition ---> reg_prepo
- la conjonction de coordination --> reg_conj_coord
- la conjonction de subordination --> reg_conj_sub
- l'interjection --> partie à traiter plus tard !

Différence entre Adverbe et Verbe au participe présent (Ex: Maintenant)
---> Le verbe à forcément un sujet / l'adverbe non !

search_verbe --> Recherche les verbe en X étapes

Etape 1 -> Recherche de l'existence de verbe
Etape 2 -> Détection du temps en fonction de la forme et des verbe précédent/suivant
Etape 3 -> Détection du sujet
Etape 4 -> Détection de l'action

!!! Détection des auxiliaires
!
!   Le verbe est conjuguais
!   -> ignorer les adverbe - être/avoir précède le verbe
!   --> On défini le temps de être/avoir comme le temps du verbe
!   --> On recherche le sujet
!
!   Le verbe est à l'infinitif (la ca se complique !)


analyse_word_table[] --> Contient chaque mot de la phrase
analyse_type_table[] --> Contient le type de chaque mot de la phrase
verbe_array[] --> Contient les données de chaque verbe
verbe_array[][0] -> Mot demandé
verbe_array[][1] -> verbe trouvé
verbe_array[][2] -> famille trouvée
verbe_array[][3] -> temps trouvé
verbe_array[][4] -> personne trouvée


*/
var ia_name = 'Aelita';
var discution_number = 0;

var ratio_taille = 0;
var ratio_marge = 0;
var cursor_point = 0;
var talk_timeout = null;
var talk_switch = 0;
var talking_time = 45000;
var talk_count_timeout = null;
var result_id = 0;
var order_act = 0;
var code_cursor = null;

var recognition = new webkitSpeechRecognition();
recognition.continuous = true;
recognition.lang = 'fr-FR';
recognition.interimResults = false;
recognition.maxAlternatives = 1;

var char_nbr;
var analyse_word_table = new Array();
var analyse_type_table = new Array();
var verbe_array = new Array();

var phrase_personne; // 1 à 6
var phrase_temps; // Temps principal du verbe
var phrase_type; // Affirmative, Imperative, Interrogative
var sujet;
var complement_direct;
var verbe_position = null;
var say_it = "";

var reg_firstspace = /^(\s)/ig;
var reg_ia_name = /^(aelita|alita|aylita|aielita|aélita)$/i;

var reg_determinant = /^(le|l|la|les|des|ce|cet|cette|chaque|quelques|plusieurs|mon|ton|son|notre|votre|leur|ma|ta|sa|mes|tes|ses|nos|vos|leurs|un|une|au|aux|du|[ 0-9]+)$/i;
var reg_pronom = /^(je|tu|il|elle|lui|toi|moi|toi-même|elle-même|moi-même|nous-même|vous-même|eux-même|lui-même|on|nous|vous|ils|elles|eux|me|te|se|en|y|ça|cela|ceci|celui|celle|ceux|celles|celui-ci|celui-là|celle-ci|celle-là|celles-ci|celles-là|ceux-ci|ceux-là|ce|c|ç|j|t|quelqu|quelque|quelques|quelques-un|quelques-une|qui|qu)$/i;
var reg_pronom_perso = /^(me|te|se|m|t|s|en|y)$/i;

var reg_pronom_1 = /^(je|moi|moi-même|me|j)$/i;
var reg_pronom_2 = /^(tu|toi|toi-même|te|t)$/i;
var reg_pronom_3 = /^(il|elle|lui|elle-même|lui-même|on|se|en|y|ça|cela|ceci|celui|celle|celui-ci|celui-là|celle-ci|celle-là|ce|c|ç|quelqu|quelque|qui|qu)$/i;
var reg_pronom_4 = /^(vous-même|vous)$/i;
var reg_pronom_5 = /^(nous-même|nous)$/i;
var reg_pronom_6 = /^(eux-même|ils|elles|eux|ceux|celles|celle-ci|celle-là|celles-ci|celles-là|ceux-ci|ceux-là|quelques|quelques-un|quelques-une)$/i;

var reg_article_contr = /^(au|aux|du|des)$/i;
var reg_prepo = /^(à|après|avant|avec|avex|chez|concernant|contre|dans|d|de|depuis|derrière|dès|devant|durant|en|entre|envers|hormis|hors|jusque|malgré|moyennant|nonobstant|outre|par|parmi|pendant|pour|près|sans|sauf|selon|sous|suivant|sur|touchant|vers|via|voilà)$/i;
var reg_conj_coord = /^(mais|ou|et|donc|or|ni|car)$/i;
var reg_conj_sub = /^(parce|que|puisque|parce que|alors que|afin que|si bien que|etc.|quand|comme|si)$/i;
var reg_adverbe = /^(ne|n|pas|assurément|certainement|effectivement|encore|évidemment|immanquablement|manifestement|oui|ok|surement|volontiers|ainsi|alors|aussi|donc|combien|comme|apparemment|hypothétiquement|peut-être|possiblement|probablement|vraisemblablement|fréquemment|habituellement|jamais|occasionnellement|souvent|successivement|rarement|toujours|assez|aussi|autant|beaucoup|bien|davantage|environ|exagérément|extrêmement|fort|intensément|modérément|moins|passablement|peu|plus|presque|sensiblement|si|tant|tellement|très|trop|où|quand|comment|pourquoi|ailleurs|là|loin|ici|partout|près|adroitement|agréablement|ainsi|aveuglément|bravement|concrètement|effrontément|gauchement|goulument|inopinément|joyeusement|lentement|obstinément|prudemment|savamment|sauvagement|rapidement|aucunement|non|nullement|jamais|rien|actuellement|aujourd|hui|autrefois|bientôt|demain|dernièrement|hier|éventuellement|immédiatement|incessamment|longtemps|présentement|prochainement|soudainement|normalement|tard|tôt|tantôt)$/i;
var adjectif = /^(Absolu|Admirable|Agréable|Aimable|Amusant|Apocalyptique|Approximatif|Attachant|Banal|Bas|Bavarois|Bien|Bof|Bon|Bouleversant|Boute-en-train|Captivant|Caractériel|Cataclysmique|Catastrophique|Céleste|Charmant|Chef-d’œuvre|Chouette|Commun|convenable|Convivial|Coquet|Correct|Crédible|Croquante|Cynique|Dégueulasse|Délectable|Délicieuse|Disjoncté|Divin|Douce|Doué|Drôle|Éblouissant|Ébouriffé|Efficace|Emballant|Émouvant|Endiablé|Ennuyant|Enragé|Enthousiasmant|Épatant|Époustouflant|Épouvantable|Équitable|Exaltant|Exceptionnel|Excusable|Exemplaire|Extra|moelleux|Féru|Festif|Flamboyante|Formidable|Grandiose|Hardi|Honnête|Horrible|Important|Impressionnant|Inconnu|Incrédule|Indépendant|Infernal|Innommable|Insignifiant|Insuffisant|Insupportable|Intenable|Intéressant|Irrésistible|Libidineux|Louable|Majestueux|Magistral|Magnifique|Médiocre|Merdique|Merveilleux|Mignon|Minable|Mirobolante|Mortel|Moyen|Négligeable|Nul|Ordinaire|Original|Parfait|Pas|pire|Passable|Passionnant|Percutant|Persévérant|Phénoménal|Placide|Plaisant|Prestant|Prodigieux|Proverbial|Quelconque|Ravissant|Recyclé|Relatif|Remarquable|Renversant|Revendicatrice|Révolutionnaire|Rocambolesque|Rutilant|Saint|Satisfaisant|Séduisant|Sexy|Somptueux|Spiritueux|Splendide|Suave|Sublime|Sulfureuse|Superbe|Suprême|Supportable|Talentueux|Tolérable|Tragique|Trépidant|Très|Troublant|Valable|Valeureux|Vénérable|Vitaminés|Vivable|Vulgaire)$/i;
var couleurs = /^(Bleu|Aigue-marine|Azur|Azurin|clair|ardoise|barbeau|bleuet|bondi|céleste|céruléen|charrette|charron|ciel|cobalt|denim|dragée|égyptien|électrique|guède|horizon|majorelle|marine|maya|minéral|nuit|outremer|paon|persan|pétrole|roi|saphir|sarcelle|smalt|tiffany|turquin|Cæruléum|Canard|Cérulé|Cyan|Fumée|Givré|Indigo|Klein|Lapis-lazuli|Lavande|Pastel|Pervenche|Turquoise|Blanc|Albâtre|Argile|brume|clair|cassé|céruse|crème|écru|lunaire|neige|opalin|Blanc-bleu  |Gris|Ardoise|Argent|Argile|Bistre|Bitume|Céladon|Châtaigne|Fumée|Grège|acier|anthracite|fer|Perle|souris|tourterelle|Mastic|Pinchard|Plomb|Mountbatten|Taupe|Tourdille|Jaune|Ambre|Aurore|Beurre|Blé|Blond|Bulle|Chamois|Champagne|Chrome|Fauve|Flave|Gomme-gutte|auréolin|banane|canari|chartreuse|mimosa|moutarde|nankin|olive|paille|poussin|Maïs|Mars|Mastic|Miel|Or|Orpiment|Sable|Safran|Soufre|Topaze|Vénitien|Brun|Acajou|Alezan|Ambre|Auburn|Basané|Beige|Beigeasse|Bistre|Bitume|Blet|Brique|Bureau|Cacao|Cachou|Café|Cannelle|Caramel|Châtaigne|Châtain|Chaudron|Chocolat|Citrouille|Fauve|Feuille-morte|Grège|Lavallière|Marron|Mordoré|Noisette|Puce|bismarck|tomette|Rouille|Senois|Sépia						|Tabac|Vanille|Noir|Cassis|Dorian|Ebène|animal|charbon|Noiraud|Réglisse|Orange|Abricot|Aurore|Bis|Bisque|Carotte|Citrouille|Corail|Cuivre|Gomme-gutte|Mandarine|Melon|Orangé|brûlée|Roux|Safran|Saumon|Tangerine|Tanné|Rose|Bisque|Cerise|Chair|Framboise|Fushia|Héliotrope|Incarnadin|Mauve|Pêche|balais|Saumon|Rouge|Amarante|Bordeaux|Brique|Cerise|Corail|Ecarlate|Fraise|Framboise|Grenadine|Grenat|Incarnadin|Incarnat|Mauve|Nacarat|Ocre|Passe-velours|Pourpre|Prune|alizarine|bismarck|bourgogne|capucine|cardinal|carmin|cinabre|coquelicot|cramoisi|Andrinople|écrevisse|feu|garance|groseille|ponceau|rubis|tomate|tomette|turc|vermillon|Rouge-violet|Rouille|Sang|Senois|Terracotta|Vermeil|Zizolin|Vert|Asperge|sarcelle|Canard|Céladon|Givré|Glauque|Hooker|Jade|Menthe|Sinople|Turquoise|absinthe|amande|anglais|anis|avocat|bouteille|chartreuse|citron|émeraude|empire|épinard|gazon|impérial|kaki|lichen|lime|malachite|mélèse|militaire|mousse|olive|opaline|perroquet|pin|pistache|poireau|pomme|prairie|prasin|printemps|sapin|sauge|smaragdin|tilleul|véronèse|viride|Violet|Améthyste|Aubergine|Byzantin|Byzantium|Cerise|Colombin|Fushia|Glycine|Héliotrope|Indigo|Lavande|Lilas|Magenta|fushia|Mauve|Orchidée|Parme|Pourpre|Prune|bonbon|Rouge-violet|Violine|Zinzolin)$/i;

function search_verbe(id){
  return new Promise((resolve,reject)=>{
    var word_search = analyse_word_table[id];

    if(analyse_word_table[id - 1] && analyse_word_table[id - 1].match(reg_article_contr)){
      analyse_type_table[id] = 'nom';
      reject();
    }

    var verbe_url = './verbe.json';
    var request = new XMLHttpRequest();
    request.open('GET', verbe_url);
    request.onload = function(){
      var verbejson = JSON.parse(request.response);
      var i = 0;
      var word_verbe = 'Aucun'
      var word_found = null;
      var word_id = null;
      var famille = 'Aucune';
      var temps = 'Aucun';
      var personne = 0;
      var verbe = true;
      var aux_position = null;

      if(word_search.match(/(-)/i)){
        var word_split = word_search.split('-');

        if(word_split[1].match(reg_pronom)){
          word_search = word_split[0];
          if(word_split[1].match(/^(je)$/i)){
            sujet[id] = new Array();
            personne = 0;
            sujet[id].push(word_split[1]);
          }
          else if(word_split[1].match(/^(tu)$/i)){
            sujet[id] = new Array();
            personne = 1;
            sujet[id].push(word_split[1]);
          }
          else if(word_split[1].match(/^(il|elle|on)$/i)){
            sujet[id] = new Array();
            personne = 2;
            sujet[id].push(word_split[1]);
          }
          else if(word_split[1].match(/^(nous)$/i)){
            sujet[id] = new Array();
            personne = 3;
            sujet[id].push(word_split[1]);
          }
          else if(word_split[1].match(/^(vous)$/i)){
            sujet[id] = new Array();
            personne = 4;
            sujet[id].push(word_split[1]);
          }
          else if(word_split[1].match(/^(ils|elles)$/i)){
            sujet[id] = new Array();
            personne = 5;
            sujet[id].push(word_split[1]);
          }
        }
      }
      var pos = id;

      while(pos >= 0){
         pos--;
         if(analyse_type_table[pos] == 'verbe')
          break;
        else if(analyse_word_table[pos] && analyse_word_table[pos].match(reg_pronom) && !analyse_word_table[pos].match(reg_pronom_perso) && !analyse_word_table[pos].match(/^(lui|elle|lui-même|elle-même|leur|les|l)$/i)){
          if(analyse_word_table[pos].match(reg_pronom_1))
            personne = 0;
          else if(analyse_word_table[pos].match(reg_pronom_2))
            personne = 1;
          else if(analyse_word_table[pos].match(reg_pronom_3))
            personne = 2;
          else if(analyse_word_table[pos].match(reg_pronom_4))
            personne = 3;
          else if(analyse_word_table[pos].match(reg_pronom_5))
            personne = 4;
          else if(analyse_word_table[pos].match(reg_pronom_6))
            personne = 5;
          break;
        }
        else if(analyse_type_table[pos] == 'nom propre'){
          personne = 2;
        }
      }

      if(id != 0 && analyse_type_table[id - 1] == 'article'){
        reject();
      }

      else if(id != 0){
        var aux = id - 1;
        while(aux >= 0){
          if(analyse_type_table[aux] == 'adverbe' || analyse_type_table[aux] == 'nom' || analyse_type_table[aux] == 'groupe nominal' || analyse_type_table[aux] == 'adjectif'){
            aux--;
          }
          else if(analyse_type_table[aux] == 'verbe' || analyse_type_table[aux] == 'auxiliaire'){
            if((verbe_array[aux][0] == 'être' || verbe_array[aux][0] == 'avoir') && !verbe_array[aux - 1]){
              //Verbe être/avoir précédent le verbe
              aux_position = aux;

              personne = verbe_array[aux][4] - 1;
              famille = verbe_array[aux][2];
              if(verbe_array[aux][2] == 'indicatif' && verbe_array[aux][3] == 'présent'){
                temps = 'passé composé';
              }
              else if(verbe_array[aux][2] == 'indicatif' && verbe_array[aux][3] == 'futur'){
                temps = 'futur antérieur';
              }
              else if(verbe_array[aux][2] == 'indicatif' && verbe_array[aux][3] == 'imparfait'){
                temps = 'plus-que-parfait';
              }
              else if(verbe_array[aux][2] == 'subjonctif' && verbe_array[aux][3] == 'présent'){
                temps = 'passé';
              }
              else if(verbe_array[aux][2] == 'subjonctif' && verbe_array[aux][3] == 'imparfait'){
                temps = 'plus-que-parfait';
              }
              else if(verbe_array[aux][2] == 'conditionnel' && verbe_array[aux][3] == 'présent'){
                temps = 'passé';
              }
              else if(verbe_array[aux][2] == 'impératif' && verbe_array[aux][3] == 'présent'){
                temps = 'passé';
              }
              analyse_type_table[aux] = 'auxiliaire';

              if(word_search.match(/.+(ée)$/i)){
                var regex = /^(.+)ée$/i;
                word_search = word_search.replace(regex, "$1é");
              }

              if(analyse_word_table[aux - 1] && analyse_word_table[aux - 1].match(/^(le|la|les|l)$/i)){
                if(!complement_direct[id])
                  complement_direct[id] = new Array();
                complement_direct[id].push(analyse_word_table[aux - 1]);
              }
            }
            break;
          }
          else{
            break;
          }
        }
      }
      else if(id != 0 && analyse_word_table[id - 1].match(/^(une|un|[1-9]+)$/i) && (!analyse_word_table[id - 2] || !analyse_word_table[id - 2].match(/^(l)$/i)) ){
        analyse_type_table[id] = 'nom';
        verbe = false;
        reject();
      }

      while(i <= '10900' && verbejson[i] && word_found == null && verbe == true){
        if(verbejson[i]['indicatif'] && (famille == 'Aucune' || famille == 'indicatif')){

          if(analyse_type_table[i - 1] == 'determinant' && analyse_type_table[i] != 'auxiliaire'){

            analyse_type_table[i] = 'nom';
            resolve();
          }
          n = personne;
          while(verbejson[i]['indicatif']['présent'][n] && word_found == null && (temps == 'Aucun' || temps == 'présent')){
            if(verbejson[i]['indicatif']['présent'][n] == word_search){
              word_found = verbejson[i]['indicatif']['présent'][n];
              word_id = i;
              famille = 'indicatif';
              temps = 'présent';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['indicatif']['passé composé'][n] && word_found == null && (temps == 'Aucun' || temps == 'passé composé') && aux_position != null){

            if(verbejson[i]['indicatif']['passé composé'][n] == word_search){

              word_found = verbejson[i]['indicatif']['passé composé'][n];
              word_id = i;
              famille = 'indicatif';
              temps = 'passé composé';
              personne = n;
            }
            else if(personne > 0){

              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['indicatif']['imparfait'][n] && word_found == null && (temps == 'Aucun' || temps == 'imparfait')){
            if(verbejson[i]['indicatif']['imparfait'][n] == word_search){
              word_found = verbejson[i]['indicatif']['imparfait'][n];
              word_id = i;
              famille = 'indicatif';
              temps = 'imparfait';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['indicatif']['plus-que-parfait'][n] && word_found == null && (temps == 'Aucun' || temps == 'plus-que-parfait') && aux_position != null){
            if(verbejson[i]['indicatif']['plus-que-parfait'][n] == word_search){
              word_found = verbejson[i]['indicatif']['plus-que-parfait'][n];
              word_id = i;
              famille = 'indicatif';
              temps = 'plus-que-parfait';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['indicatif']['passé simple'][n] && word_found == null && (temps == 'Aucun' || temps == 'passé simple')){
            if(verbejson[i]['indicatif']['passé simple'][n] == word_search){
              word_found = verbejson[i]['indicatif']['passé simple'][n];
              word_id = i;
              famille = 'indicatif';
              temps = 'passé simple';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['indicatif']['passé antérieur'][n] && word_found == null && (temps == 'Aucun' || temps == 'passé antérieur') && aux_position != null){
            if(verbejson[i]['indicatif']['passé antérieur'][n] == word_search){
              word_found = verbejson[i]['indicatif']['passé antérieur'][n];
              word_id = i;
              famille = 'indicatif';
              temps = 'passé antérieur';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['indicatif']['futur simple'][n] && word_found == null && (temps == 'Aucun' || temps == 'futur simple')){
            if(verbejson[i]['indicatif']['futur simple'][n] == word_search){
              word_found = verbejson[i]['indicatif']['futur simple'][n];
              word_id = i;
              famille = 'indicatif';
              temps = 'futur simple';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['indicatif']['futur antérieur'][n] && word_found == null && (temps == 'Aucun' || temps == 'futur antérieur') && aux_position != null){
            if(verbejson[i]['indicatif']['futur antérieur'][n] == word_search){
              word_found = verbejson[i]['indicatif']['futur antérieur'][n];
              word_id = i;
              famille = 'indicatif';
              temps = 'futur antérieur';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
        }
        if(verbejson[i]['subjonctif'] && (famille == 'Aucune' || famille == 'subjonctif')){
          n = personne;
          while(verbejson[i]['subjonctif']['présent'][n] && word_found == null && (temps == 'Aucun' || temps == 'présent')){
            if(verbejson[i]['subjonctif']['présent'][n] == word_search){
              word_found = verbejson[i]['subjonctif']['présent'][n];
              word_id = i;
              famille = 'subjonctif';
              temps = 'présent';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['subjonctif']['passé'][n] && word_found == null && (temps == 'Aucun' || temps == 'passé') && aux_position != null){
            if(verbejson[i]['subjonctif']['passé'][n] == word_search){
              word_found = verbejson[i]['subjonctif']['passé'][n];
              word_id = i;
              famille = 'subjonctif';
              temps = 'passé';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['subjonctif']['imparfait'][n] && word_found == null && (temps == 'Aucun' || temps == 'imparfait')){
            if(verbejson[i]['subjonctif']['imparfait'][n] == word_search){
              word_found = verbejson[i]['subjonctif']['imparfait'][n];
              word_id = i;
              famille = 'subjonctif';
              temps = 'imparfait';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['subjonctif']['plus-que-parfait'][n] && word_found == null && (temps == 'Aucun' || temps == 'plus-que-parfait') && aux_position != null){
            if(verbejson[i]['subjonctif']['plus-que-parfait'][n] == word_search){
              word_found = verbejson[i]['subjonctif']['plus-que-parfait'][n];
              word_id = i;
              famille = 'subjonctif';
              temps = 'plus-que-parfait';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
        }
        if(verbejson[i]['conditionnel'] && (famille == 'Aucune' || famille == 'conditionnel')){
          n = personne;
          while(verbejson[i]['conditionnel']['présent'][n] && word_found == null && (temps == 'Aucun' || temps == 'présent')){
            if(verbejson[i]['conditionnel']['présent'][n] == word_search){
              word_found = verbejson[i]['conditionnel']['présent'][n];
              word_id = i;
              famille = 'conditionnel';
              temps = 'présent';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['conditionnel']['passé 1ère forme'][n] && word_found == null && (temps == 'Aucun' || temps == 'passé') && aux_position != null){
            if(verbejson[i]['conditionnel']['passé 1ère forme'][n] == word_search){
              word_found = verbejson[i]['conditionnel']['passé 1ère forme'][n];
              word_id = i;
              famille = 'conditionnel';
              temps = 'passé 1ère forme';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['conditionnel']['passé 2ème forme'][n] && word_found == null && (temps == 'Aucun' || temps == 'passé') && aux_position != null){
            if(verbejson[i]['conditionnel']['passé 2ème forme'][n] == word_search){
              word_found = verbejson[i]['conditionnel']['passé 2ème forme'][n];
              word_id = i;
              famille = 'conditionnel';
              temps = 'passé 2ème forme';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
        }
        if(verbejson[i]['impératif'] && (famille == 'Aucune' || famille == 'impératif')){
          n = personne;
          while(verbejson[i]['impératif']['présent'][n] && word_found == null && (temps == 'Aucun' || temps == 'présent')){
            if(verbejson[i]['impératif']['présent'][n] == word_search){
              word_found = verbejson[i]['impératif']['présent'][n] ;
              word_id = i;
              famille = 'impératif';
              temps = 'présent';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['impératif']['passé'][n] && word_found == null && (temps == 'Aucun' || temps == 'passé') && aux_position != null){
            if(verbejson[i]['impératif']['passé'][n] == word_search){
              word_found = verbejson[i]['impératif']['passé'][n];
              word_id = i;
              famille = 'impératif';
              temps = 'passé';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
        }
        if(verbejson[i]['infinitif'] && (famille == 'Aucune' || famille == 'infinitif')){
          n = 0;
          while(verbejson[i]['infinitif']['présent'][n] && word_found == null && (temps == 'Aucun' || temps == 'présent')){
            if(verbejson[i]['infinitif']['présent'][n] == word_search){
              word_found = verbejson[i]['infinitif']['présent'][n];
              word_id = i;
              famille = 'infinitif';
              temps = 'présent';
              personne = n;
            }
            n++;
          }
        }
        if(verbejson[i]['participe'] && (famille == 'Aucune' || famille == 'participe')){
          n = personne;
          while(verbejson[i]['participe']['présent'][n] && word_found == null && (temps == 'Aucun' || temps == 'présent')){
            if(verbejson[i]['participe']['présent'][n] == word_search){
              word_found = verbejson[i]['participe']['présent'][n];
              word_id = i;
              famille = 'participe';
              temps = 'présent';
              personne = n;
            }
            else if(personne > 0){
              break;
            }
            n++;
          }
          n = personne;
          while(verbejson[i]['participe']['passé'][n] && word_found == null && (temps == 'Aucun' || temps == 'passé')){
          if(verbejson[i]['participe']['passé'][n] == word_search){
            word_found = verbejson[i]['participe']['passé'][n];
            word_id = i;
            famille = 'participe';
            temps = 'passé';
            personne = n;
          }
          else if(personne > 0){
            break;
          }
          n++;
        }
        }
        if(word_found != null)
          word_verbe = verbejson[i]['infinitif']['présent'][0];
        i++;
      }
      if(word_found != null){
        if(!sujet[id]){
          sujet[id] = new Array();
          complement_direct[id] = new Array();
        }

        analyse_type_table[id] = 'verbe';
        verbe_position = id;
        if(famille == 'subjonctif'){
          if(analyse_word_table[id - 1] && analyse_word_table[id - 1].match(reg_pronom_1) && !analyse_word_table[id - 1].match(reg_pronom_perso))
            personne = 0;
          else if(analyse_word_table[id - 1] && analyse_word_table[id - 1].match(reg_pronom_2) && !analyse_word_table[id - 1].match(reg_pronom_perso))
            personne = 1;
          else if(analyse_word_table[id - 1] && analyse_word_table[id - 1].match(reg_pronom_3) && !analyse_word_table[id - 1].match(reg_pronom_perso))
            personne = 2;
          else if(analyse_word_table[id - 1] && analyse_word_table[id - 1].match(reg_pronom_4) && !analyse_word_table[id - 1].match(reg_pronom_perso))
            personne = 3;
          else if(analyse_word_table[id - 1] && analyse_word_table[id - 1].match(reg_pronom_5) && !analyse_word_table[id - 1].match(reg_pronom_perso))
            personne = 4;
          else if(analyse_word_table[id - 1] && analyse_word_table[id - 1].match(reg_pronom_6) && !analyse_word_table[id - 1].match(reg_pronom_perso))
            personne = 5;
          else if(analyse_word_table[id - 1].match(reg_pronom_perso)){
            if(analyse_word_table[id - 2] && analyse_word_table[id - 2].match(reg_pronom_1))
              personne = 0;
            else if(analyse_word_table[id - 2] && analyse_word_table[id - 2].match(reg_pronom_2))
              personne = 1;
            else if(analyse_word_table[id - 2] && analyse_word_table[id - 2].match(reg_pronom_3))
              personne = 2;
            else if(analyse_word_table[id - 2] && analyse_word_table[id - 2].match(reg_pronom_4))
              personne = 3;
            else if(analyse_word_table[id - 2] && analyse_word_table[id - 2].match(reg_pronom_5))
              personne = 4;
            else if(analyse_word_table[id - 2] && analyse_word_table[id - 2].match(reg_pronom_6))
              personne = 5;
            else
              personne = 2;
          }
          else
            personne = 2;
        }

        verbe_array[id] = new Array(word_verbe, word_id, famille, temps, (personne + 1), aux_position);
        if(analyse_word_table[i - 1] && analyse_word_table[i - 1].match(/^(le|la|les|l)$/i)){
          complement_direct[id].push(analyse_word_table[i - 1]);
        }
        resolve();
      }
      else{
        if(analyse_type_table[id - 1] && analyse_type_table[id - 1] == 'nom' && !analyse_word_table[id].match(/[A-Z][a-z]+/)){
          analyse_type_table[id - 1] = 'groupe nominal';
          analyse_type_table[id] = 'groupe nominal';
          resolve();
        }
        else{
          analyse_type_table[id] = 'nom';
          verbe_array[id] = null;
          if(analyse_word_table[id].match(/[A-Z][a-z]+/)){
            analyse_type_table[id] = 'nom propre';
          }
          resolve();
        }
      }
    }
    request.send();
  });
}
async function word_detect(phrase){
  sujet = new Array();
  complement_direct = new Array();
  sujet_id = new Array();
  say_it = "";
  phrase_type = null;
  if(phrase.match(reg_firstspace)){
    console.log('premier espace retiré');
    phrase = phrase.replace(reg_firstspace, '');
  }
  analyse_word_table = phrase.split(/\s|'/);
  analyse_type_table = new Array(analyse_word_table.lenght);
  verbe_array = new Array(analyse_word_table.lenght);
  char_nbr = analyse_word_table.lenght;
  var i = 0;
  while(analyse_word_table[i]){
    if(!analyse_type_table[i] && analyse_word_table[i].match(reg_ia_name)){
      analyse_type_table[i] = "Nom IA";
      analyse_word_table[i] = "Aelita";
    }
    else if(!analyse_type_table[i] && analyse_word_table[i].match(reg_pronom)){
      if(i == 0 && analyse_word_table[i].match(/^(qui)$/i)){
        phrase_type = 'interrogative';
      }
      if(analyse_word_table[i].match(reg_pronom_1))
        analyse_type_table[i] = "pronom_1";
      else if(analyse_word_table[i].match(reg_pronom_2))
        analyse_type_table[i] = "pronom_2";
      else if(analyse_word_table[i].match(reg_pronom_3))
        analyse_type_table[i] = "pronom_3";
      else if(analyse_word_table[i].match(reg_pronom_4))
        analyse_type_table[i] = "pronom_4";
      else if(analyse_word_table[i].match(reg_pronom_5))
        analyse_type_table[i] = "pronom_5";
      else if(analyse_word_table[i].match(reg_pronom_6))
        analyse_type_table[i] = "pronom_6";
    }
    else if(!analyse_type_table[i] && analyse_word_table[i].match(reg_adverbe)){
      analyse_type_table[i] = "adverbe";
      if(i == 0 && analyse_word_table[i].match(/^(où|quand|comment|pourquoi|combien)$/i)){
        phrase_type = 'interrogative';
      }
      else if(i > 0 && analyse_word_table[i].match(/^(où|quand|comment|pourquoi|combien)$/i)){
        // TODO: Différencier phrase interrogative et affirmative
      }
    }
    else if(!analyse_type_table[i] && analyse_word_table[i].match(reg_conj_coord)){
      analyse_type_table[i] = "conjonction coordination";
    }
    else if(!analyse_type_table[i] && analyse_word_table[i].match(reg_conj_sub)){
      analyse_type_table[i] = "conjonction subordination";
    }
    else if(!analyse_type_table[i] && analyse_word_table[i].match(reg_prepo)){
      analyse_type_table[i] = "preposition";
    }
    else if(!analyse_type_table[i] && analyse_word_table[i].match(reg_determinant)){
      analyse_type_table[i] = "determinant";
    }
    else if(!analyse_type_table[i]){
      try {
        await search_verbe(i);
      } catch(e) {
        console.log(e);
      }
    }
    i++;
  }

  analyse_phrase();
}
function analyse_phrase(){
  console_add('analyse démarrée', 'green');
  verbe_position = null;

  var i = 0;

  var verbe_act = false;
  while(analyse_word_table[i]){
    var do_aux = null;
    if(analyse_type_table[i] == 'auxiliaire'){
      var n = 0;
      while(analyse_word_table[n]){
        if(verbe_array[n])
        if(verbe_array[n] && verbe_array[n][5] == i){
          do_aux = 1;
        }
        else{}
        n++;
      }
      if(do_aux == null)
        analyse_type_table[i] = 'verbe';
    }

    if(analyse_type_table[i] == 'verbe')
      verbe_act = true;
    if(analyse_type_table[i]){
      if(verbe_array[i])
        console.log("Mot " + i + " ---> $" + analyse_word_table[i] + "$ - " + analyse_type_table[i] + " -> " + verbe_array[i][0] + " [ " + verbe_array[i][2] + ", " + verbe_array[i][3] + ", " + verbe_array[i][4] + " ]");
      else
        console.log("Mot " + i + " ---> $" + analyse_word_table[i] + "$ - " + analyse_type_table[i]);
    }
    else {
      console.error("Mot " + i + " ---> $" + analyse_word_table[i] + "$ - Mot");
    }
    i++;
  }

  i = 0;

  while(analyse_word_table[i]){
    if(verbe_array[i] && verbe_array[i][2] != 'infinitif' && analyse_type_table[i] != 'auxiliaire'){
      verbe_position = i;
      var verbe_count = i;
      var sujet_detect = 0;

      // While cherchant le sujet
      while(verbe_count >= 0){
        if(analyse_word_table[verbe_count].match(reg_determinant) && analyse_type_table[verbe_count + 1] == 'nom'){
          if(analyse_word_table[verbe_count].match(/^(de|du|des)$/i) || (analyse_word_table[verbe_count - 1] && analyse_word_table[verbe_count - 1].match(/^(de|du|des)$/i))){
            var n = verbe_count;
            while(n >= 0){
              if(analyse_type_table[n] == 'auxiliaire' || analyse_type_table[n] == 'verbe' || analyse_type_table[n] == 'adverbe'){
                break;
              }
              n--;
            }
            while(n <= verbe_count){
              sujet[i].push(analyse_word_table[n]);
              sujet_id.push(n);
              n++;
            }
            sujet[i].push(analyse_word_table[verbe_count + 1]);
            sujet_id.push(verbe_count + 1);
          }
          else{
            sujet[i].push(analyse_word_table[verbe_count]);
            sujet[i].push(analyse_word_table[verbe_count + 1]);
            sujet_id.push(verbe_count);
            sujet_id.push(verbe_count + 1);
          }
          sujet_detect = 1;
          break;
        }
        verbe_count--;
      }
      verbe_count = i;
      while(verbe_count >= 0){
        if(analyse_word_table[verbe_count].match(reg_pronom) || analyse_type_table[verbe_count] == 'nom propre' || analyse_type_table[verbe_count] == 'Nom IA' || analyse_type_table[verbe_count] == 'nom'){
          if(analyse_word_table[verbe_count].match(reg_pronom_perso) || (analyse_type_table[verbe_count] == 'nom propre' && verbe_array[i][4] == '3') || (analyse_type_table[verbe_count] == 'nom' && verbe_array[i][4] == '3') || (analyse_type_table[verbe_count] == 'Nom IA' && verbe_array[i][4] == '2')){}
          else if((analyse_word_table[verbe_count].match(reg_pronom_1) && verbe_array[i][4] == '1') || (analyse_word_table[verbe_count].match(reg_pronom_2) && verbe_array[i][4] == '2') || (analyse_word_table[verbe_count].match(reg_pronom_3) && verbe_array[i][4] == '3') || (analyse_word_table[verbe_count].match(reg_pronom_4) && verbe_array[i][4] == '4') || (analyse_word_table[verbe_count].match(reg_pronom_5) && verbe_array[verbe_count][4] == '5') || (analyse_word_table[verbe_count].match(reg_pronom_6) && verbe_array[i][4] == '6')){
            sujet[i].push(analyse_word_table[verbe_count]);
            sujet_id.push(verbe_count);

            sujet_detect = 1;
            break;
          }
          else{
            break;
          }
        }
        verbe_count--;
      }

      if(sujet_detect == 1)
        console.error('le Verbe est ' + analyse_word_table[i] + " et le sujet " + sujet[i].join(' '));
      sujet_detect = 0;
      //}
    }
    i++;
  }
  say_it += "Fin d'analyse ! ";

  var validation = new Array();
  i = 0;
  while(i <= analyse_word_table.length){
    if(sujet[i] && sujet[i].join(' ') != ''){
      console.error('Le sujet est : ' + sujet[i].join(' ') + '');
      say_it += "Le sujet est : " + sujet[i].join(' ') + ". ";
      validation[i] = 1;
    }
    i++;
  }
  if (validation.length == 0) {
    sujet[0] = new Array;
    sujet[0].push("Tu");
    say_it += "Pas de sujet, discution machine. ";
    if(verbe_position != null && phrase_type != null){
      phrase_type = 'imperatif';
    }
  }
  if(phrase_type != null){
    say_it += "le type de phrase est " + phrase_type + ". ";
  }
  else{
    phrase_type = 'affirmatif';
    say_it += "le type de phrase est Affirmatif. ";
  }

  i = 0;
  validation = new Array();
  while(i <= analyse_word_table.length){
    if(complement_direct[i] && complement_direct[i].join(' ') != ''){
      say_it += "le complément direct est : " + complement_direct[i].join(' ') + ". ";
      if(verbe_array[i])
        console.error("le complément direct de " + verbe_array[i][0] + " est : " + complement_direct[i].join(' '));
      else
        console.error("le complément direct est : " + complement_direct[i].join(' '));
      validation[i] = 1;
    }
    else if(complement_direct[i]){
      var n = i + 1;
      while(n < analyse_word_table.length && analyse_type_table[n] != "verbe" && analyse_type_table[n] != "auxiliaire"){
        complement_direct[i].push(analyse_word_table[n]);
        n++;
      }
      if(complement_direct[i].join(' ') != ''){
        say_it += "le complément direct est : " + complement_direct[i].join(' ') + ". ";
        if(verbe_array[i])
          console.error("le complément direct de " + verbe_array[i][0] + " est : " + complement_direct[i].join(' '));
        else
          console.error("le complément direct est : " + complement_direct[i].join(' '));
        validation[i] = 1;
      }
    }
    i++;
  }
  if (validation.length == 0){
    say_it += "Il n'y a pas de complément direct. ";
    console.error("Il n'y a pas de complément direct");
  }

  dit_bonjour(say_it);
  repondre();
  //Détection du sujet dans la phrase
}
function repondre(){
  console.log('réponse...');
}
function console_add(contenu, txt_color){
  if(txt_color == null)
    txt_color = '#FFF';
  else if(txt_color == 'white'){
    txt_color = '#FFF';
  }
  else if(txt_color == 'red'){
    txt_color = '#e86153';
  }
  else if(txt_color == 'blue'){
    txt_color = '#42e4ec';
  }
  else if(txt_color == 'green'){
    txt_color = '#42ec80';
  }
  else if(txt_color == 'yellow'){
    txt_color = '#fafa6a';
  }
  else if(txt_color == 'grey'){
    txt_color = '#acb6b8';
  }
  else if(txt_color == 'orange'){
    txt_color = '#f9c36f';
  }
  document.querySelector('.rec_console').innerHTML += "<a class='console_line' style=\"color: " + txt_color + "\">" + contenu + "</a>";
}
function ecoute_moi(){
  result_id = 0;
  recognition.onresult = function(event){
    console.log(event.results[result_id][0].transcript);
    word_detect(event.results[result_id][0].transcript);

    result_id++;
  }
  recognition.start();
  recognition.onend = recognition.start();
}
function change_circle(pixel){
  if(talk_timeout != null){
    clearTimeout(talk_timeout);
    talk_timeout = null;
  }
  ratio_taille = (pixel / 5) - ratio_taille;
  ratio_marge = ratio_taille / 2;

  document.querySelector('.talk_circle').style.width = ratio_taille + "px";
  document.querySelector('.talk_circle').style.height = ratio_taille + "px";
  document.querySelector('.talk_circle_bis').style.width = ratio_taille + "px";
  document.querySelector('.talk_circle_bis').style.height = ratio_taille + "px";
  document.querySelector('.talk_circle_ter').style.width = ratio_taille + "px";
  document.querySelector('.talk_circle_ter').style.height = ratio_taille + "px";

  document.querySelector('.talk_circle').style.top = "calc(50vh - " + ratio_marge + "px)";
  document.querySelector('.talk_circle').style.left = "calc(50vw - " + ratio_marge + "px)";
  document.querySelector('.talk_circle_bis').style.top = "calc(50vh - " + ratio_marge + "px)";
  document.querySelector('.talk_circle_bis').style.left = "calc(50vw - " + ratio_marge + "px)";
  document.querySelector('.talk_circle_ter').style.top = "calc(50vh - " + ratio_marge + "px)";
  document.querySelector('.talk_circle_ter').style.left = "calc(50vw - " + ratio_marge + "px)";

  talk_timeout = setTimeout(function(){
    document.querySelector('.talk_circle').style.width = "150px";
    document.querySelector('.talk_circle').style.height = "150px";
    document.querySelector('.talk_circle_bis').style.width = "150px";
    document.querySelector('.talk_circle_bis').style.height = "150px";
    document.querySelector('.talk_circle_ter').style.width = "150px";
    document.querySelector('.talk_circle_ter').style.height = "150px";
    document.querySelector('.talk_circle').style.top = "calc(50vh - 75px)";
    document.querySelector('.talk_circle').style.left = "calc(50vw - 75px)";
    document.querySelector('.talk_circle_bis').style.top = "calc(50vh - 75px)";
    document.querySelector('.talk_circle_bis').style.left = "calc(50vw - 75px)";
    document.querySelector('.talk_circle_ter').style.top = "calc(50vh - 75px)";
    document.querySelector('.talk_circle_ter').style.left = "calc(50vw - 75px)";
  }, 350);
}
function dit_bonjour(texte){
    ratio_taille = 0;
    talk_switch = 1;
    var message = new SpeechSynthesisUtterance(texte);
    message.lang = 'fr-FR';
    message.rate = 1.25;
    message.pitch = 0.75;
    //on lance la lecture du message
    window.speechSynthesis.speak(message);

    message.onboundary = function(event) {
      change_circle(event.elapsedTime);
      while(cursor_point <= event.charIndex && texte[cursor_point]){
        document.querySelector('.txt_screen').innerHTML += texte[cursor_point];
        cursor_point++;
      }
    }
    message.onend = function(event){
      document.querySelector('.talk_circle').style.width = "150px";
      document.querySelector('.talk_circle').style.height = "150px";
      document.querySelector('.talk_circle_bis').style.width = "150px";
      document.querySelector('.talk_circle_bis').style.height = "150px";
      document.querySelector('.talk_circle_ter').style.width = "150px";
      document.querySelector('.talk_circle_ter').style.height = "150px";
      document.querySelector('.talk_circle').style.top = "calc(50vh|75px)";
      document.querySelector('.talk_circle').style.left = "calc(50vw|75px)";
      document.querySelector('.talk_circle_bis').style.top = "calc(50vh|75px)";
      document.querySelector('.talk_circle_bis').style.left = "calc(50vw|75px)";
      document.querySelector('.talk_circle_ter').style.top = "calc(50vh|75px)";
      document.querySelector('.talk_circle_ter').style.left = "calc(50vw|75px)";
      while(cursor_point <= event.charIndex && texte[cursor_point]){
        document.querySelector('.txt_screen').innerHTML += texte[cursor_point];
        cursor_point++;
      }
      setTimeout(function(){
        document.querySelector('.txt_screen').innerHTML = '';
      }, 1500);

      talk_switch = 0;
    }
  }

/*
function search_verbe(word_search, id){
  var verbe_url = './verbe.json';
  var request = new XMLHttpRequest();
  request.open('GET', verbe_url);
  request.onload = function(){
    var verbejson = JSON.parse(request.response);
    var i = 0;
    var word_verbe = 'Aucun'
    var word_found = null;
    var word_id = null;
    var famille = 'Aucune';
    var temps = 'Aucun';
    var personne = 1;

    if(id != 0 && analyse_type_table[id - 1] == 'article'){
      return 2;
    }
    else if(id != 0 && analyse_type_table[id - 1] == 'verbe'){
      if(verbe_array[id - 1][0] == 'être'){
        dit_bonjour('verbe être précédent le mot ' + word_search);
      }
    }

    while(i <= '10900' && verbejson[i] && word_found == null){
      if(verbejson[i]['indicatif']){
        n = 0;
        while(verbejson[i]['indicatif']['présent'][n] && word_found == null){
          if(verbejson[i]['indicatif']['présent'][n] == word_search){
            word_found = verbejson[i]['indicatif']['présent'][n];
            word_id = i;
            famille = 'indicatif';
            temps = 'présent';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['indicatif']['passé composé'][n] && word_found == null){
          if(verbejson[i]['indicatif']['passé composé'][n] == word_search){
            word_found = verbejson[i]['indicatif']['passé composé'][n];
            word_id = i;
            famille = 'indicatif';
            temps = 'passé composé';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['indicatif']['imparfait'][n] && word_found == null){
          if(verbejson[i]['indicatif']['imparfait'][n] == word_search){
            word_found = verbejson[i]['indicatif']['imparfait'][n];
            word_id = i;
            famille = 'indicatif';
            temps = 'imparfait';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['indicatif']['plus-que-parfait'][n] && word_found == null){
          if(verbejson[i]['indicatif']['plus-que-parfait'][n] == word_search){
            word_found = verbejson[i]['indicatif']['plus-que-parfait'][n];
            word_id = i;
            famille = 'indicatif';
            temps = 'plus-que-parfait';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['indicatif']['passé simple'][n] && word_found == null){
          if(verbejson[i]['indicatif']['passé simple'][n] == word_search){
            word_found = verbejson[i]['indicatif']['passé simple'][n];
            word_id = i;
            famille = 'indicatif';
            temps = 'passé simple';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['indicatif']['passé antérieur'][n] && word_found == null){
          if(verbejson[i]['indicatif']['passé antérieur'][n] == word_search){
            word_found = verbejson[i]['indicatif']['passé antérieur'][n];
            word_id = i;
            famille = 'indicatif';
            temps = 'passé antérieur';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['indicatif']['futur simple'][n] && word_found == null){
          if(verbejson[i]['indicatif']['futur simple'] == word_search){
            word_found = verbejson[i]['indicatif']['futur simple'];
            word_id = i;
            famille = 'indicatif';
            temps = 'futur simple';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['indicatif']['futur antérieur'][n] && word_found == null){
          if(verbejson[i]['indicatif']['futur antérieur'][n] == word_search){
            word_found = verbejson[i]['indicatif']['futur antérieur'][n];
            word_id = i;
            famille = 'indicatif';
            temps = 'futur antérieur';
            personne = n;
          }
          n++;
        }
      }
      if(verbejson[i]['subjonctif']){
        n = 0;
        while(verbejson[i]['subjonctif']['présent'][n] && word_found == null){
          if(verbejson[i]['subjonctif']['présent'][n] == word_search){
            word_found = verbejson[i]['subjonctif']['présent'][n];
            word_id = i;
            famille = 'subjonctif';
            temps = 'présent';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['subjonctif']['passé'][n] && word_found == null){
          if(verbejson[i]['subjonctif']['passé'][n] == word_search){
            word_found = verbejson[i]['subjonctif']['passé'][n];
            word_id = i;
            famille = 'subjonctif';
            temps = 'passé';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['subjonctif']['imparfait'][n] && word_found == null){
          if(verbejson[i]['subjonctif']['imparfait'][n] == word_search){
            word_found = verbejson[i]['subjonctif']['imparfait'][n];
            word_id = i;
            famille = 'subjonctif';
            temps = 'imparfait';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['subjonctif']['plus-que-parfait'][n] && word_found == null){
          if(verbejson[i]['subjonctif']['plus-que-parfait'][n] == word_search){
            word_found = verbejson[i]['subjonctif']['plus-que-parfait'][n];
            word_id = i;
            famille = 'subjonctif';
            temps = 'plus-que-parfait';
            personne = n;
          }
          n++;
        }
      }
      if(verbejson[i]['conditionnel']){
        n = 0;
        while(verbejson[i]['conditionnel']['présent'][n] && word_found == null){
          if(verbejson[i]['conditionnel']['présent'][n] == word_search){
            word_found = verbejson[i]['conditionnel']['présent'][n];
            word_id = i;
            famille = 'conditionnel';
            temps = 'présent';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['conditionnel']['passé 1ère forme'][n] && word_found == null){
          if(verbejson[i]['conditionnel']['passé 1ère forme'][n] == word_search){
            word_found = verbejson[i]['conditionnel']['passé 1ère forme'][n];
            word_id = i;
            famille = 'conditionnel';
            temps = 'passé 1ère forme';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['conditionnel']['passé 2ème forme'][n] && word_found == null){
          if(verbejson[i]['conditionnel']['passé 2ème forme'][n] == word_search){
            word_found = verbejson[i]['conditionnel']['passé 2ème forme'][n];
            word_id = i;
            famille = 'conditionnel';
            temps = 'passé 2ème forme';
            personne = n;
          }
          n++;
        }
      }
      if(verbejson[i]['impératif']){
        n = 0;
        while(verbejson[i]['impératif']['présent'][n] && word_found == null){
          if(verbejson[i]['impératif']['présent'][n] == word_search){
            word_found = verbejson[i]['impératif']['présent'][n] ;
            word_id = i;
            famille = 'impératif';
            temps = 'présent';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['impératif']['passé'][n] && word_found == null){
          if(verbejson[i]['impératif']['passé'][n] == word_search){
            word_found = verbejson[i]['impératif']['passé'][n];
            word_id = i;
            famille = 'impératif';
            temps = 'passé';
            personne = n;
          }
          n++;
        }
      }
      if(verbejson[i]['infinitif']){
        n = 0;
        while(verbejson[i]['infinitif']['présent'][n] && word_found == null){
          if(verbejson[i]['infinitif']['présent'][n] == word_search){
            word_found = verbejson[i]['infinitif']['présent'][n];
            word_id = i;
            famille = 'infinitif';
            temps = 'présent';
            personne = n;
          }
          n++;
        }
      }
      if(verbejson[i]['participe']){
        n = 0;
        while(verbejson[i]['participe']['présent'][n] && word_found == null){
          if(verbejson[i]['participe']['présent'][n] == word_search){
            word_found = verbejson[i]['participe']['présent'][n];
            word_id = i;
            famille = 'participe';
            temps = 'présent';
            personne = n;
          }
          n++;
        }
        n = 0;
        while(verbejson[i]['participe']['passé'][n] && word_found == null){
        if(verbejson[i]['participe']['passé'][n] == word_search){
          word_found = verbejson[i]['participe']['passé'][n];
          word_id = i;
          famille = 'participe';
          temps = 'passé';
          personne = n;
        }
        n++;
      }
      }
      if(word_found != null)
        word_verbe = verbejson[i]['infinitif']['présent'][0];
      i++;
    }
    if(word_found != null){
      console.log(word_search + " est le verbe " + word_verbe + " est à la place " + word_id + "\nFamille : " + famille + "\nTemps : " + temps + "\nPersonne : " + (personne + 1));
      var reponse = new Array(word_search, word_id, famille, temps, (personne + 1));
      verbe_array[id] = new Array(word_verbe, word_id, famille, temps, (personne + 1));

      return reponse;
    }
    else{
      return(1);
    }
  }
  request.send();
}
*/
