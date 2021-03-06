<html>
  <head>
    <link rel="stylesheet" href='test_style.css'/>
    <script type="text/javascript" src="beta_script.js"></script>
    <!--
    <script type="text/javascript">
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

    var analyse_word_table;
    var analyse_type_table;
    var verbe_array = new Array();
    var response_table = new Array();
    response_table["j'ai"] = "tu as";
    response_table["t'ai"] = "m'as";
    response_table["t'a"] = "m'a";
    response_table["m'a"] = "t'a";
    response_table["m'as"] = "t'ai";

    response_table["j'allais"] = "tu allais";
    response_table["j'irai"] = "tu iras";
    response_table["j'irais"] = "tu irais";

    response_table["j'allais"] = "tu allais";

    response_table["t'es"] = "m'es";
    response_table["t'est"] = "m'est";
    response_table["m'es"] = "t'es";

    response_table["je"] = 'tu';
    response_table["tu"] = 'je';
    response_table["il"] = 'il';
    response_table["elle"] = 'elle';
    response_table["nous"] = 'vous';
    response_table["vous"] = 'je';
    response_table["ils"] = 'ils';
    response_table["elles"] = 'elles';
    response_table["me"] = 'te';
    response_table["te"] = 'me';
    response_table["se"] = 'se';
    response_table["le"] = 'le';
    response_table["la"] = 'la';
    response_table["les"] = 'les';
    response_table["moi"] = 'toi';
    response_table["toi"] = 'moi';
    response_table["soi"] = 'soi';
    response_table["lui"] = 'lui';
    response_table["eux"] = 'eux';
    response_table["en"] = 'en';
    response_table["y"] = 'y';
    response_table["mon"] = 'ton';
    response_table["ton"] = 'mon';
    response_table["ma"] = 'ta';
    response_table["ta"] = 'ma';
    response_table["mes"] = 'tes';
    response_table["tes"] = 'mes';
    response_table["votre"] = 'mon';
    response_table["vos"] = 'mes';
    response_table["vos"] = 'nous';

    response_table["es"] = 'suis';
    response_table["as"] = 'ai';
    response_table["suis"] = 'es';
    response_table["avez"] = "ai";
    response_table["vas"] = "vais";
    response_table["vais"] = "vas";
    response_table["allez"] = "vais";

    var reg_pronom = /^(je|tu|il|elle|nous|vous|ils|elles|me|te|se|le|la|les|moi|toi|soi|lui|leur|eux|en|y|mon|ton|ma|ta|mes|tes|votre|vos|on)$/i;
    var reg_pronom_1 = /^(je|me|moi|mon|mes|j')$/i;
    var reg_pronom_2 = /^(tu|te|toi|ton|ta|tes|t')$/i;
    var reg_pronom_3 = /^(il|elle|se|soi|lui|on)$/i;
    var reg_pronom_4 = /^(nous|notre|nos)$/i;
    var reg_pronom_5 = /^(vous|votre|vos)$/i;
    var reg_pronom_6 = /^(ils|elles|leur|eux)$/i;

    var reg_pronom_verbe = /(j'|m'|t')[a-z]+$/i;

    /*
    var reg_verbe_premier = /A??rer|Abaisser|abandonner|Abc??der|Abdiquer|Ab??cher|Abecquer|Ab??quer|Aberrer|Abhorrer|Ab??mer|Abjurer|Ablater|Abloquer|Aboyer|Abomber|Abominer|Abonder|Abonner|Aborder|Aborner|Aboucher|Abouler|Abouter|Abr??ger|Abraser|Abreuver|Abricoter|Abriter|Abroger|Absenter|Absorber|Absterger|Abuser|Ac??rer|Acagnarder|Acc??der|Accabler|Accagnarder|Accaparer|Accastiller|Acc??l??rer|Accentuer|Accepter|Accessoinser|Accidenter|Acclamer|Acclimater|Accoler|Accommoder|Accompagner|Accorer|Accorder|Accoster|Accoter|Accouer|Accoucher|Accoupler|Accoutrer|Accoutumer|Accr??diter|Accrocher|Acculer|Acculturer|Accumuler|Accuser|Acenser|Ac??tifier|Ac??tyler|Acheter|Achever|Achaler|Achalander|Acharner|Acheminer|Achopper|Achromatiser|Aci??rer|Acidifier|Aciduler|Aciseler|Acoquiner|Acquiescer|Acquitter|Acter|Actionner|Activer|Actualiser|Adapter|Additionner|Adh??rer|Adirer|Adjectiver|Adjectiviser|Adjuger|Adjurer|Administrer|Admirer|Admonester|Adoniser|Adonner|Adopter|Adorer|Adosser|Adouber|Adresser|Adsorber|Aduler|Adult??rer|Adverbialiser|Aff??rer|Affabuler|Affaisser|Affaiter|Affaler|Affamer|Aff??ager|Affecter|Affectionner|Affermer|Afficher|Affiler|Affilier|Affiner|Affleurer|Affirmer|Affliger|Afflouer|Affluer|Affoler|Affouager|Affouiller|Affourager|Affourcher|Affourrager|Affr??ter|Affriander|Affricher|Affrioler|Affriter|Affronter|Affruiter|Affubler|Affurer|Aff??ter|Africaniser|Agacer|Agencer|Agglom??rer|Agglutiner|Aggraver|Agioter|Agiter|Agneler|Agoniser|Agr??er|Agr??ger|Agrafer|Agr??menter|Agresser|Agricher|Agripper|Aguicher|Ahaner|Aicher|Aider|Aiguayer|Aiguiller|Aiguilleter|Aiguillonner|Aiguiser|Ailler|Aimer|Aimanter|Airer|Ajointer|Ajourer|Ajourner|Ajouter|Ajuster|Al??ser|Alambiquer|Alarguer|Alarmer|Alcaliniser|Alcaliser|Alcooliser|Alerter|Aleviner|Ali??ner|Aligner|Alimenter|Aliter|All??cher|All??ger|All??guer|Allier|Allaiter|All??goriser|Allonger|Allouer|Allumer|Alluvionner|Alpaguer|Alphab??tiser|Alt??rer|Alterner|Aluminer|Aluner|Amener|Amadouer|Amalgamer|Amariner|Amarrer|Amasser|Amateloter|Amatelotter|Ambiancer|Ambitionner|Ambler|Ambrer|Am??liorer|Am??nager|Amender|Amenuiser|Am??ricaniser|Ameuter|Amidonner|Aminer|Amnistier|Amocher|Amodier|Amonceler|Amorcer|Amordancer|Amourer|Amouracher|Amplifier|Amputer|Amurer|Amuser|Analg??sier|Analyser|Anastomoser|Anath??matiser|Anatomiser|Ancrer|An??mier|Anesth??sier|Angler|Anglaiser|Angliciser|Angoisser|Anh??ler|Animer|Animaliser|Aniser|Ankyloser|Anneler|Annexer|Annihiler|Annoncer|Annoter|Annualiser|Annuler|Anodiser|??nonner|Ant??poser|Anticiper|Antidater|Ao??ter|Apaiser|Apanager|Apatamer|Apetisser|Apeurer|Apiquer|Apitoyer|Aplomber|Aposter|Apostasier|Apostiller|Apostropher|Appeler|App??ter|Appairer|Apparier|Appareiller|Apparenter|App??ter|Appertiser|Appliquer|Appointer|Apponter|Apporter|Apposer|Appr??cier|Appr??hender|Appr??ter|Apprivoiser|Approcher|Approprier|Approuver|Approvisionner|Appuyer|Apurer|Aquiger|Arabiser|Araser|Arbitrer|Arborer|Arboriser|Arc-bouter|Archa??ser|Architecturer|Archiver|Ar??onner|Arder|Ardoiser|Argenter|Argoter|Argotiser|Argougner|Arguer|Argumenter|Ariser|Armer|Armorier|Arnaquer|Aromatiser|Arp??ger|Arpenter|Arpigner|Arquer|Arquebuser|Arquepincer|Arracher|Arraisonner|Arranger|Arrenter|Arr??rager|Arr??ter|Arri??rer|Arrimer|Arriser|Arriver|Arroser|Articuler|Artiller|Ascensionner|Aseptiser|Aspecter|Asperger|Asphalter|Asphyxier|Aspirer|Ass??cher|Assener|Ass??ner|Assaisonner|Assarmenter|Assassiner|Assembler|Assermenter|Assi??ger|Assibiler|Assigner|Assimiler|Assister|Associer|Assoiffer|Assoler|Assommer|Assoner|Assoter|Assumer|Assurer|Asticoter|Astiquer|Atermoyer|Atomiser|Atourner|Atrophier|Atteler|Attabler|Attacher|Attaquer|Attenter|Att??nuer|Atterrer|Attester|Attiger|Attifer|Attirer|Attiser|Attitrer|Attraper|Attribuer|Attriquer|Attrister|Attrouper|Aubiner|Auditionner|Augmenter|Augurer|Auner|Aur??oler|Aurifier|Ausculter|Authentifier|Authentiquer|Auto-envoyer|Autoenvoyer|Autofinancer|Autographier|Automatiser|Autopsier|Autoriser|Av??rer|Avoyer|Avaler|Avaliser|Avancer|Avantager|Avarier|Aventurer|Aveugler|Aviner|Aviser|Avitailler|Aviver|Avocasser|Avoiner|Avoisiner|Avorter|Avouer|Avuer|Axer|Axiomatiser|Azimuter|Azimuther|Azurer|Bayer|B??er|B??guer|B??quer|Babeler|Babiller|B??cher|Bachoter|B??cler|Bader|Badauder|Badigeonner|Badiner|Baffer|Bafouer|Bafouiller|B??frer|Bagarrer|Bagoter|Bagotter|Bagouler|Baguer|Baguenauder|Baigner|Bailler|B??iller|B??illonner|Baiser|Baisoter|Baisser|Balayer|Balader|Balafrer|Balancer|Balanstiquer|Balbutier|Baleiner|Baligander|Baliser|Baliverner|Balkaniser|Baller|Ballaster|Ballonner|Ballotter|Balluchonner|Balter|Baluchonner|Balustrer|Bambocher|Banaliser|Bananer|Bancher|Bander|Banner|Banquer|Banqueter|Baptiser|Baquer|Baqueter|Bar??ter|Baragouiner|Baraquer|Baratiner|Baratter|Barber|Barbeyer|Barbifier|Barboter|Barbouiller|Barder|Barder|Barguigner|Barioler|Barjaquer|Barloquer|Baronner|Barouder|Barrer|Barricader|Baser|Basaner|Basculer|Bassiner|Baster|Bastillonner|Bastionner|Bastonner|Bateler|B??ter|Batailler|Batifoler|B??tonner|Baver|Bavarder|Bavasser|Bazarder|Bavocher|B??atifier|B??cher|B??cheveter|B??coter|Becquer|Becqueter|Becter|Bedonner|B??gayer|B??galer|B??gueter|B??ler|Beloter|B??moliser|B??n??ficier|Benner|B??queter|B??quiller|Bercer|Berdeller|Berlurer|Berner|Besogner|B??tifier|B??tiser|B??tonner|Beugler|Beurrer|Biaiser|Bibarder|Bibeloter|Biberonner|Bicher|Bichonner|Bichoter|Se bider|Bidonner|Bidouiller|Biffer|Biffetonner|Bifurquer|Bigarrer|Bigler|Biglouser|Bigophoner|Bigorner|Bigrer|Bilaner|Biller|Billebauder|Billonner|Biloquer|Biner|Biologiser|Biquer|Biser|Biscuiter|Biseauter|Bisegmenter|Bisquer|Bisser|Bistourner|Bistrer|Biter|Bitonner|Bitter|Bitumer|Bituminer|Bivouaquer|Bizuter|Bl??ser|Blablater|Blackbouler|Blaguer|Blairer|Bl??mer|Blaser|Blasonner|Blasph??mer|Blat??rer|Bleffer|Blesser|Bleuter|Blinder|Blinquer|Blobloter|Blondoyer|Bloquer|Blouser|Bluffer|Bluter|Blutiner|Bobiner|Bocarder|Boetter|Boiser|Boiter|Boitiller|Bolcheviser|Bomber|Bombarder|Bonder|Bond??riser|Bondonner|Bonifier|Bonimenter|Boquillonner|Border|Bord??liser|Bordurer|Borgnoter|Borner|Bornoyer|Bosseler|Bosser|Bossuer|Bostonner|Botteler|Botaniser|Botter|Bottiner|Bouger|Boubouler|Boucaner|Boucher|Boucharder|Bouchonner|Boucler|Bouder|Boudiner|Bouffer|Bouffonner|Bougonner|Bouillonner|Bouillotter|Bouler|Boulanger|Bouleverser|Bouliner|Boulocher|Boulonner|Boulotter|Boumer|Bouquiner|Bourder|Bourdonner|Bourgeonner|Bourlinguer|Bourreler|Bourrer|Boursicoter|Boursouffler|Boursoufler|Bousculer|Bousiller|Boustifailler|Bouter|Bouteiller|Boutonner|Bouturer|Boxer|Boxonner|Boycotter|Brayer|Braconner|Brader|Brailler|Braiser|Bramer|Brancarder|Brancher|Brandonner|Brandiller|Branler|Branlocher|Braquer|Braser|Brasiller|Brasquer|Brasser|Brasseyer|Braver|Bredouiller|Br??ler|Brelander|Breller|Br??siller|Br??tailler|Br??tauder|Bretauder|Bretteler|Bretter|Breveter|Bricoler|Brider|Bridger|Briefer|Briffer|Brigander|Briguer|Briller|Brillanter|Brillantiner|Brimer|Brimbaler|Bringuebaler|Brinqueballer|Briocher|Briquer|Briqueter|Briser|Broyer|Broadcaster|Brocanter|Brocarder|Brocher|Broder|Broncher|Bronzer|Broquer|Broquanter|Brosser|Brouetter|Brouiller|Brouillasser|Brouillonner|Brouter|Bruiner|Bruisser|Bruiter|Br??ler|Brumer|Brumasser|Brusquer|Brutaliser|B??cher|Budg??ter|Budg??tiser|Buller|Bureaucratiser|Buriner|Buser|Busquer|Buter|Butiner|Butter|Buvoter|C??der|Celer|Cabaler|Cabaner|Cabiner|C??bler|Cabosser|Caboter|Cabotiner|Cabrer|Cabrioler|Cacaber|Cacarder|Cacher|Cacheter|Cachetonner|Cachotter|Cadancher|Cadastrer|Cadeauter|Cadencer|Cadenasser|Cadoter|Cadrer|Cafarder|Cafeter|Cafouiller|Cafter|Cagner|Cagnarder|Caguer|Cahoter|Cailler|Cailleter|Caillebotter|Caillouter|Ca??manter|Cajoler|Caler|Caleter|Calamistrer|Calancher|Calandrer|Calciner|Calculer|Calfater|Calfeutrer|Calibrer|C??liner|Calligraphier|Calmer|Calomnier|Calorifuger|Calotter|Calquer|Calter|Cambrer|Cambrioler|Cambuter|Cameloter|Camemb??rer|Camionner|Camoufler|Camper|Camphrer|Caner|Canaliser|Canarder|Cancaner|Canc??riser|Canneler|Canner|Cannibaliser|Canoniser|Canonner|Canoter|Cantiner|Cantonner|Canuler|Caoutchouter|Cap??er|Capeler|Capeyer|Capahuter|Capara??onner|Capitaliser|Capitonner|Capituler|Caponner|Caporaliser|Capoter|Capsuler|Capter|Captiver|Capturer|Capuchonner|Caquer|Caqueter|Car??ner|Carer|Carier|Carabiner|Caracoler|Caract??riser|Caramboler|Caram??liser|caram??liser|carapater|Carbonater|Carboniser|Carburer|Carcailler|Carder|Carencer|Caresser|Carguer|Caricaturer|Carillonner|Carmer|Carminer|carnifier|Carotter|Caroubler|Carreler|Carrer|Carroyer|Carrosser|Carter|Cartonner|Cartoucher|Caser|Cascader|Cas??ifier|Casemater|Caserner|Casquer|Casser|Casse-cro??ter|Castagner|Castrer|Cataloguer|Catalyser|Catapulter|Catastropher|Catcher|Cat??chiser|Catiner|Cauchemarder|Causer|Caut??riser|Cautionner|Caver|Cavacher|Cavaler|Cavalcader|Caviarder|C??gotter|Ceinturer|C??l??brer|C??menter|Cendrer|Censurer|Center|Centrer|Centraliser|Centrifuger|Centupler|Cercler|Cerner|Certifier|C??sariser|Cesser|Ch??rer|Chier|Chabler|Chagriner|Chahuter|Cha??ner|Challenger|Chalouper|chamailler|Chamarrer|Chambarder|Chambouler|Chambrer|Chameauser|Chamoiser|Champagniser|Champlever|Changer|Chanceler|Chancetiquer|Chansonner|Chanfreiner|Chanstiquer|Chanter|Chantonner|Chantourner|Chapeler|Chaparder|Chapeauter|Chaperonner|Chapitrer|Chaponner|Chaptaliser|Charger|Se charger|Charbonner|Charcuter|Se charcuter|Charlater|Chariboter|Charmer|Charpenter|Charrier|Charroyer|Chart??riser|Chasser|Ch??tier|Ch??taigner|Chatoyer|Chatonner|Chatouiller|Ch??trer|Chauffer|Chauler|Chaumer|Chausser|Chavirer|Chawer|Chelinguer|Cheminer|Chemiser|Ch??nevotter|Chercher|Cherrer|Chevaler|Chevaucher|Cheviller|Chevreter|Chevronner|Chevroter|Chiader|Chialer|Chicaner|chicorer|chicorner|Chicoter|Chicotter|Chienner|Chiffonner|Chiffrer|Chigner|Chimer|Chiner|Chinoiser|Chiper|Chipoter|Chiquer|Chirographier|Chlinguer|Chlorer|Chloroformer|Chlorurer|Choyer|Chocotter|Chofer|Ch??mer|Choper|Chopiner|Chopper|Choquer|Chor??graphier|Choser|Chosifier|Chouanner|Chouchouter|Choufer|Chourer|Chouraver|Chouriner|Christianiser|Chromer|Chromatiser|Chroniquer|Chronom??trer|Chroumer|Chuchoter|Chuinter|Chuter|Cibler|Cicatriser|Cigler|Ciller|Cimenter|Cin??matographier|Cingler|Cintrer|Cirer|Circonstancier|Circuler|Ciseler|Cisailler|Citer|Civiliser|Cl??ber|Clabauder|Claboter|Clacher|Claironner|Clamer|Clamecer|Clamper|Clamser|Claper|Clapoter|Clapper|Clapser|Claquer|Claqueter|Claquemurer|Clarifier|Classer|Classifier|Claudiquer|Claustrer|Claver|Claveter|Clavetter|Clayonner|Clicher|Clienter|Cligner|Clignoter|Climatiser|Cliquer|Cliqueter|Cliquoter|Clisser|Cliver|Clocher|Clochardiser|Cloisonner|Clo??trer|Cloner|Cloper|Clopiner|Cloquer|Cl??turer|Clouer|Clouter|Cnser|Coaguler|Coaliser|Coasser|Cocher|C??cher|Cochonner|Cocoter|Cocotter|Cocufier|Coder|Codifier|Co??diter|Coexister|Coffrer|Cog??rer|Cogiter|Cogner|Cognoter|Cohabiter|Coh??riter|Coiffer|Coincer|Co??ncider|Co??ter|Cok??fier|Cokser|Coller|Colleter|Collaborer|Collapser|Collationner|Collecter|Collectionner|Collectiviser|Colliger|Colloquer|Colluder|Colmater|Coloniser|Colorer|Colorier|Coloriser|Colporter|Coltiner|Combiner|Combler|Combuger|Comm??rer|Commander|Commanditer|Comm??morer|Commencer|Commenter|Commercer|Commercialiser|Commissionner|Commotionner|Commuer|Communier|Communaliser|Communiquer|Commuter|Comp??ter|Compacter|Comparer|Compartimenter|Compasser|Compenser|Compiler|Compisser|Compl??ter|Complexer|Complexifier|Complimenter|Compliquer|Comploter|Comporter|Composer|Composter|Compresser|Comprimer|Compter|Comptabiliser|Compulser|Computer|Conc??der|Concasser|Conc??l??brer|Concentrer|Conceptualiser|Concerner|Concerter|Concilier|Concocter|Concorder|Concr??ter|Concr??tiser|Concurrencer|Condamner|Condenser|Conditionner|Conf??rer|Confier|Confabuler|Confectionner|Conf??d??rer|Confesser|Confiancer|Configurer|Confiner|Confirmer|Confisquer|Confiturer|Confluer|Conformer|Conforter|Confronter|Congeler|Cong??dier|Congestionner|Conglom??rer|Conglutiner|Congr??er|Congratuler|Conjecturer|Conjuguer|Conjurer|Connecter|Connobler|Connoter|Conobler|Conobrer|Consacrer|Conscientiser|Conseiller|Conserver|Consid??rer|Consigner|Consister|Consoler|Consolider|Consommer|Consoner|Conspirer|Conspuer|Constater|Consteller|Consterner|Constiper|Constituer|Constitutionnaliser|Consulter|Consumer|Conter|Contacter|Contagionner|Containeriser|Contaminer|Contempler|Conteneuriser|Contenter|Contester|Contingenter|Continuer|Contorsionner|Contourner|Contrer|Contracter|Contractualiser|Contracturer|Contrarier|Contraster|Contre-attaquer|Contre-hacher|Contre-indiquer|Contre-manifester|Contre-miner|Contre-murer|Contre-passer|Contre-plaquer|Contre-pointer|Contre-sceller|Contre-tirer|Contrebalancer|Contrebouter|Contrebraquer|Contrebuter|Contrecarrer|Contrehacher|Contremander|Contremarquer|Contrepointer|Contresigner|Contribuer|Contrister|Contr??ler|Controuver|Controverser|Contusionner|Convier|Conventionner|Converger|Converser|Convivialiser|Convoyer|Convoiter|Convoler|Convoquer|Convulser|Convulsionner|Coop??rer|Coopter|Coordonner|Copier|Copermuter|Copiner|Coposs??der|Copter|Copuler|Coquer|Coqueter|Coquiller|Coraniser|Cordeler|Corder|Cordonner|Corner|Cornancher|Cornaquer|Corr??ler|Correctionaliser|Correctionnaliser|Corriger|Corroyer|Corroborer|Corroder|Corser|Corseter|Cosigner|Cosm??tiquer|Cosser|Costumer|Coter|Cotiser|C??toyer|Cotonner|Coucher|Couchailler|Couder|Coudoyer|Couiller|Couillonner|Couiner|Couler|Coulisser|Couper|Coupailler|Coupeller|Coupler|Courailler|Courber|Courbaturer|Couronner|Courroucer|Courser|Court-circuiter|Courtauder|Courtiser|Cousiner|Co??ter|Couteauner|Coutoyer|Coutoner|Couturer|Couver|Coxer|Cr??cher|Cr??er|Cr??mer|Cr??ner|Crever|Crier|Cracher|Crachiner|Crachoter|Crachouiller|Crailler|Cramer|Cramponner|Crampser|Cramser|Craner|Cr??ner|Cranter|Crapahuter|Crapa??ter|Crapoter|Crapuler|Craqueler|Craquer|Craqueter|Crasser|Cravacher|Cravater|Crawler|Crayonner|Cr??dibiliser|Cr??diter|Cr??neler|Cr??oliser|Cr??osoter|Cr??per|Cr??piter|Cr??tiniser|Creuser|Crevasser|Criailler|Cribler|Criminaliser|Criquer|Crisper|Crisser|Cristalliser|Criticailler|Critiquer|Croasser|Crocher|Crocheter|Croiser|Croller|Croquer|Crosser|Crotter|Crouler|Croupionner|Croustiller|Cro??ter|Crucifier|Crypter|Cryptographier|Cuber|Cuirasser|Cuisiner|Cuivrer|Culer|Culbuter|Culminer|Culotter|Culpabiliser|Cultiver|Cumuler|Curer|Cureter|Cuveler|Cuver|Cyanoser|Cylindrer|D??cher|Dactylographier|Daguer|Daigner|Daller|Damer|Damasquiner|Damasser|Damner|Dandiner|Danser|Dansotter|Darder|Dater|Dauber|D??activer|Dealer|D??ambuler|D??b??cher|D??b??cler|D??bagouler|D??b??illonner|D??baller|D??balourder|D??banaliser|D??bander|D??banquer|D??baptiser|D??barboter|D??barbouiller|D??barder|D??barquer|D??barrer|D??barrasser|D??b??ter|D??baucher|D??becqueter|D??becter|D??bequeter|D??biliter|D??billarder|D??biner|D??biter|D??blayer|D??blat??rer|D??bloquer|D??bobiner|D??boguer|D??boiser|D??bo??ter|D??bonder|D??border|D??bosseler|D??botter|D??boucher|D??boucler|D??bouder|D??bouler|D??boulonner|D??bouquer|D??bourber|D??bourrer|D??bourser|D??boussoler|D??bouter|D??boutonner|D??brayer|D??braguetter|D??brancher|D??brider|D??briefer|D??brocher|D??br??ler|D??brouiller|D??brousser|D??broussailler|D??bucher|D??budg??tiser|D??bugger|D??buller|D??bureaucratiser|D??busquer|D??buter|D??c??der|D??celer|D??cacheter|D??cadenasser|D??cadrer|D??caf??iner|D??caisser|D??caler|D??calaminer|D??calcariser|D??calcifier|D??calotter|D??calquer|D??camper|D??caniller|D??canter|D??capeler|D??caper|D??capiter|D??capitaliser|D??capoter|D??capsuler|D??capuchonner|D??carburer|D??carcasser|D??carpiller|D??carreler|D??carrer|D??cartonner|D??causer|D??caver|D??cavaillonner|D??c??l??rer|D??centrer|D??centraliser|D??cercler|D??c??r??brer|D??cerner|D??cerveler|D??cesser|D??chagriner|D??cha??ner|D??chanter|D??chaper|D??chaperonner|D??charger|D??charner|D??chasser|D??ch??sser|D??chaumer|D??chausser|D??chev??trer|D??cheviller|D??chiffonner|D??chiffrer|D??chiqueter|D??chirer|D??chlorurer|D??chouer|D??christianiser|D??chromer|D??cider|D??cimer|D??cimaliser|D??cintrer|D??clamer|D??clarer|D??classer|D??claveter|D??clencher|D??cl??ricaliser|D??cliner|D??cliqueter|D??cloisonner|D??clouer|D??cocher|D??coder|D??coffrer|D??coiffer|D??coincer|D??col??rer|D??coller|D??colleter|D??coloniser|D??colorer|D??commander|D??communiser|D??compenser|D??compl??ter|D??complexer|D??composer|D??compresser|D??comprimer|D??compter|D??concentrer|D??concerter|D??conditionner|D??congeler|D??congestionner|D??conner|D??connecter|D??conseiller|D??consid??rer|D??consigner|D??constiper|D??contaminer|D??contenancer|D??contracter|D??corcer|D??corer|D??corder|D??corner|D??cortiquer|D??coucher|D??couler|D??couper|D??coupler|D??courager|D??couronner|D??cr??ter|D??crier|D??crambuter|D??cramponner|D??crapouiller|D??crasser|D??cr??dibiliser|D??cr??diter|D??cr??per|D??cr??piter|D??creuser|D??criminaliser|D??crisper|D??crocher|D??croiser|D??crotter|D??cro??ter|D??cruer|D??cruser|D??crypter|D??cuivrer|D??culasser|D??culotter|D??culpabiliser|D??cupler|D??cuver|D??dier|D??daigner|D??damer|D??dicacer|D??dommager|D??dorer|D??douaner|D??doubler|D??dramatiser|D??f??quer|D??f??rer|D??fier|D??falquer|D??farder|D??farguer|D??fatiguer|D??faucher|D??faufiler|D??fausser|D??favoriser|D??fenestrer|D??ferler|D??ferrer|D??ferriser|D??feuiller|D??feutrer|D??figer|D??fibrer|D??ficeler|D??ficher|D??figurer|D??filer|D??fiscaliser|D??flagrer|D??flaquer|D??flegmer|D??floquer|D??florer|D??folier|D??foncer|D??forcer|D??former|D??fouler|D??fourailler|D??fourner|D??fourrer|D??frayer|D??franciser|D??fretter|D??fricher|D??fringuer|D??friper|D??friser|D??froisser|D??froncer|D??froquer|D??fruiter|D??frusquer|D??geler|D??gager|D??gainer|D??galonner|D??ganter|D??gasoliner|D??gazer|D??gazoliner|D??gazonner|D??g??n??rer|D??germer|D??gingander|D??g??ter|D??givrer|D??glacer|D??glinguer|D??gluer|D??gobiller|D??goiser|D??gommer|D??gonder|D??gonfler|D??gorger|D??goter|D??gotter|D??goudronner|D??gouliner|D??goupiller|D??gourer|D??gourrer|D??go??ter|D??goutter|D??gr??er|D??gr??ner|D??grever|D??grader|D??grafer|D??graisser|D??gravoyer|D??gringoler|D??gripper|D??griser|D??grosser|D??gueuler|D??gueulasser|D??guignonner|D??guiser|D??gurgiter|D??guster|D??haler|D??hancher|D??harder|D??harnacher|D??hotter|D??houiller|D??ifier|D??jeter|D??janter|D??jauger|D??jeuner|D??jouer|D??jucher|D??layer|D??l??guer|D??lier|D??lacer|D??labialiser|D??labrer|D??labyrinther|D??lainer|D??laisser|D??laiter|D??larder|D??lasser|D??latter|D??laver|D??l??aturer|D??lecter|D??l??gitimer|D??lester|D??lib??rer|D??lignifier|D??limiter|D??lin??er|D??lirer|D??lisser|D??liter|D??livrer|D??loger|D??localiser|D??loquer|D??lover|D??lurer|D??lustrer|D??luter|D??ma??onner|D??magn??tiser|D??mailler|D??mailloter|D??manger|D??mancher|Demander|D??manteler|D??mantibuler|D??maquiller|D??marier|D??marabouter|D??marcher|D??marquer|D??marrer|D??mascler|D??masquer|D??mastiquer|D??m??ter|D??mat??rialiser|D??mazouter|D??m??dicaliser|D??m??ler|D??membrer|D??m??nager|D??merger|D??m??riter|D??m??thaniser|D??meubler|Demeurer|D??mieller|D??militariser|D??miner|D??min??raliser|D??missionner|D??mobiliser|D??mocratiser|D??moder|D??moduler|D??mon??tiser|D??monter|D??montrer|D??moraliser|D??motiver|D??moucheter|D??mouler|D??moustiquer|D??multiplier|D??murer|D??murger|D??museler|D??mystifier|D??mythifier|D??nier|D??nasaliser|D??nationaliser|D??natter|D??naturer|D??naturaliser|D??nazifier|D??n??buler|D??n??buliser|D??neiger|D??nerver|D??niaiser|D??nicher|D??nickeler|D??nicotiniser|D??nigrer|D??nitrer|D??nitrifier|D??niveler|D??noyer|D??nombrer|D??nommer|D??noncer|D??noter|D??nouer|D??noyauter|Densifier|Denteler|D??nuer|D??nucl??ariser|D??nuder|D??pailler|D??paisseler|D??palisser|D??panner|D??paqueter|D??parer|D??parier|D??paraffiner|D??parasiter|D??pareiller|D??parler|D??partager|D??partementaliser|D??passer|D??passionner|D??patrier|D??paver|D??payser|D??pecer|D??p??cher|D??peigner|D??pelotonner|D??p??naliser|D??penser|D??personnaliser|D??p??trer|D??peupler|D??phaser|D??phosphorer|D??piauter|D??pigmenter|D??piler|D??pingler|D??piquer|D??pister|D??piter|D??plier|D??placer|D??plafonner|D??planer|D??planquer|D??planter|D??pl??trer|D??plisser|D??ployer|D??plomber|D??plorer|D??plumer|D??pocher|D??po??tiser|D??pointer|D??polariser|D??politiser|D??polluer|D??polym??riser|D??pontiller|D??populariser|D??porter|D??poser|D??poss??der|D??poter|D??poudrer|D??pouiller|D??poussi??rer|D??praver|D??pr??cier|D??pressuriser|D??primer|D??priser|D??programmer|D??prol??tariser|D??propaniser|D??prot??ger|D??puceler|D??pulper|D??purer|D??puter|D??qualifier|D??quiller|D??rayer|D??r??gler|D??rager|D??raciner|D??rader|D??railler|D??raisonner|D??ramer|D??ranger|D??raper|D??raser|D??rater|D??ratiser|D??r??aliser|D??relier|D??responsabiliser|D??r??sumenter|D??rider|D??river|D??roger|D??rober|D??rocher|D??roder|D??rouiller|D??rouler|D??router|D??sa??rer|D??sabonner|D??sabuser|D??saccentuer|D??sacclimater|D??saccorder|D??saccoupler|D??saccoutumer|D??sacidifier|D??saci??rer|D??sacraliser|D??sactiver|D??sadapter|D??saffecter|D??saffilier|D??saffourcher|D??saffubler|D??sagencer|D??sagr??ger|D??sagrafer|D??saimer|D??saimanter|D??saisonnatiser|D??sajuster|D??sali??ner|D??saligner|D??salper|D??salt??rer|D??samarrer|D??sambigu??ser|D??samianter|D??samidonner|D??saminer|D??samorcer|D??sannexer|D??saper|D??sapparier|D??sappointer|D??sapprouver|D??sapprovisionner|D??sar??onner|D??sargenter|D??sarmer|D??sarrimer|D??sarticuler|D??sassembler|D??sassimiler|D??satomiser|D??savantager|D??saveugler|D??savouer|D??saxer|Desceller|D??s??chouer|D??sectoriser|D??sembarquer|D??sembobiner|D??sembourber|D??sembourgeoiser|D??sembouteiller|D??sembrayer|D??sembuer|D??semmancher|D??sempeser|D??semparer|D??semprisonner|D??sencadrer|D??sencarter|D??sencha??ner|D??senchanter|D??senclaver|D??sencombrer|D??sencrasser|D??s??nerver|D??senfiler|D??senfler|D??senflammer|D??senfumer|D??sengager|D??sengluer|D??sengorger|D??sengrener|D??senivrer|D??senlacer|D??sennuyer|D??senrayer|D??senrhumer|D??senrouer|D??sensabler|D??sensibiliser|D??sensorceler|D??sentoiler|D??sentortiller|D??sentraver|D??senvaser|D??senvelopper|D??senvenimer|D??senverguer|D??senvo??ter|D??s??quilibrer|D??s??quiper|D??serter|D??sesp??rer|D??s??tamer|D??s??tatiser|D??sexciter|D??sexualiser|D??shabiller|D??shabituer|D??sherber|D??sh??riter|D??sheurer|D??shonorer|D??shuiler|D??shumaniser|D??shumidifier|D??shydrater|D??shydrog??ner|D??shypoth??quer|D??signer|D??sillusionner|D??sincarner|D??sincorporer|D??sincruster|D??sinculper|D??sindexer|D??sindustrialiser|D??sinfatuer|D??sinfecter|D??sinformer|D??sinhiber|D??sinsectiser|D??sint??grer|D??sint??resser|D??sintoxiquer|D??sinviter|D??sirer|D??sobliger|D??sobstruer|D??soccuper|D??socialiser|D??sodoriser|D??soler|D??solidariser|D??soperculer|D??sopiler|D??sorber|D??sorbiter|D??sordonner|D??sorganiser|D??sorienter|D??sosser|D??souffler|D??soxyder|D??soxyg??ner|Desquamer|Dess??cher|Dessabler|Dessaler|Dessangler|Dessaouler|Dessaper|Desseller|Desserrer|Dessiller|Dessiner|Dessoler|Dessouder|Dessouffler|Desso??ler|Dessuinter|D??stabiliser|Destiner|Destituer|Destocker|D??structurer|D??sulfiter|D??sulfurer|D??synchroniser|D??teler|D??tacher|D??tailler|D??taler|D??taller|D??tapisser|D??tartrer|D??taxer|D??tecter|D??terger|D??t??riorer|D??terminer|D??terrer|D??tester|D??tirer|D??tisser|D??toner|D??tonneler|D??tonner|D??tortiller|D??tourer|D??tourner|D??toxiquer|D??tracter|D??trancher|D??transposer|D??traquer|D??tremper|D??tresser|D??tricoter|D??tromper|D??tr??ner|D??troncher|D??troquer|D??trousser|D??vier|D??valer|D??valiser|D??valoriser|D??valuer|Devancer|D??vaser|D??vaster|D??velopper|D??venter|D??verguer|D??verrouiller|D??verser|D??vider|Deviner|D??virer|D??virginiser|D??viriliser|D??viroler|Deviser|D??visager|D??visser|D??vitaliser|D??vitrifier|D??voyer|D??voiler|D??volter|D??vorer|D??vouer|D??zinguer|Diaboliser|Diagnostiquer|Dialectaliser|Dialectiser|Dialoguer|Dialyser|Diamanter|Diaphragmer|Diaprer|Dicter|Di??ser|Di??s??liser|Diff??rer|Diffamer|Diff??rencier|Difformer|Diffracter|Diffuser|Dig??rer|Digitaliser|Digresser|Dilac??rer|Dilapider|Dilater|Diligenter|Diluer|Dimensionner|Diminuer|D??ner|Dindonner|Dinguer|Diphtonguer|Dipl??mer|Diriger|Discerner|Discipliner|Discompter|Discontinuer|Discorder|Discounter|Discr??diter|Discriminer|Disculper|Discuputer|Discursiviser|Discuter|Discutailler|Disgracier|Disjoncter|Disloquer|Dispatcher|Dispenser|Disperser|Disposer|Disproportionner|Disputer|Disputailler|Disqualifier|Diss??quer|Diss??miner|Disserter|Dissimuler|Dissiper|Dissocier|Dissoner|Dissuader|Distancer|Distancier|Distiller|Distinguer|Distribuer|Divaguer|Diverger|Diversifier|Diviniser|Diviser|Divorcer|Divulguer|Djibser|Documenter|Dodeliner|Dogmatiser|Doguer|Doigter|Doler|Domestiquer|Domicilier|Dominer|Dompter|Donner|Doper|Dorer|Dorloter|Doser|Doter|Douer|Doubler|Doublonner|Doucher|Douiller|Douter|Drayer|Dracher|Drag??ifier|Drageonner|Draguer|Drainer|Dramatiser|Drapeler|Draper|Draver|Dresser|Dribbler|Driller|Driver|Droguer|Droper|Drosser|Dulcifier|Duper|Duplexer|Dupliquer|Durer|Dynamiser|Dynamiter|??barber|??baucher|??bavurer|??berluer|??biseler|??borgner|??bosser|??bouer|??bouillanter|??bouler|??bourgeonner|??bouriffer|??bourrer|??bouter|??bouzer|??br??cher|??braiser|??brancher|??branler|??braser|??brouer|??bruiter|??bruter|??cacher|??caffer|??cailler|??caler|??canguer|??carbouiller|??carquiller|??carteler|??carter|??chafauder|??chalasser|??changer|??chancrer|??chanfreiner|??chantillonner|??chapper|??chardonner|??charner|??charper|??chauder|??chauffer|??chauler|??chaumer|??chelonner|??cheniller|??cheveler|??chiner|??chopper|??chouer|??cimer|??clabousser|??clairer|??clater|??clipser|??clisser|??cloper|??cluser|??cobuer|??c??urer|??conomiser|??coper|??corcer|??corer|??corcher|??corner|??cornifler|??cosser|??couler|??courter|??couter|??couvillonner|??cr??mer|??crabouiller|??craser|??cr??ter|??crivailler|??crivasser|??crouer|??cro??ter|??cuisser|??culer|??cumer|??curer|??cussonner|??denter|??dicter|??difier|??diter|??ditionner|??dulcorer|??duquer|??faufiler|Effacer|Effaner|Effarer|Effaroucher|Effectuer|Eff??miner|Effeuiller|Effiler|Effilocher|Efflanquer|Effleurer|Effluver|Effondrer|Effrayer|Effranger|Effriter|??gayer|??galer|??galiser|??garer|??gnaffer|??go??ner|??gorger|??goutter|??grener|??grainer|??grapper|??gratigner|??gravillonner|??griser|??gruger|??gueuler|??houper|??jaculer|??jarrer|??jecter|??jointer|??lever|??laborer|??laguer|??lancer|??lectrifier|??lectriser|??lectrocuter|??lectrolyser|??lectroniser|??lider|??limer|??liminer|??linguer|??loigner|??longer|??luer|??lucider|??lucubrer|??luder|??m??cher|??mier|??macier|??mailler|??maner|??manciper|??marger|??masculer|Embabouiner|Emballer|Emballotter|Emballuchonner|Embarbouiller|Embarder|Embarquer|Embarrer|Embarrasser|Embastiller|Embastionner|Emb??ter|Embaucher|Embaumer|Embecquer|Emb??guiner|Emberlificoter|Emb??ter|Embidonner|Embistrouiller|Emblaver|Embobeliner|Embobiner|Embo??ter|Embosser|Embotteler|Embouer|Emboucaner|Emboucher|Embouquer|Embourber|Embourgeoiser|Embourrer|Embourrmaner|Embouter|Embouteiller|Embrayer|Embreler|Embrener|Embrever|Embrancher|Embraquer|Embraser|Embrasser|Embrigader|Embringuer|Embrocher|Embroncher|Embrouiller|Embroussailler|Embrumer|Embuer|Embusquer|??mender|??merger|??merillonner|??meriser|??merveiller|??m??tiser|??mietter|??migrer|??mincer|Emmener|Emm??trer|Emmagasiner|Emmailloter|Emmancher|Emmannequiner|Emmarger|Emm??ler|Emm??nager|Emmerder|Emmieller|Emmitonner|Emmitoufler|Emmortaiser|Emmotter|Emmouscailler|Emmurer|??monder|??morfiler|??motionner|??motter|??moucher|??moucheter|??mousser|??moustiller|Empeser|Empaffer|Empailler|Empaler|Empalmer|Empanacher|Empanner|Empapahouter|Empapaouter|Empapilloter|Empaqueter|Emparquer|Emp??ter|Empatter|Empaumer|Emp??cher|Empeigner|Empener|Empenner|Empercher|Emperler|Empester|Emp??trer|Empi??ter|Empieger|Empierrer|Empiffrer|Empiler|Empirer|Emplafonner|Empl??trer|Employer|Emplumer|Empocher|Empoigner|Empoisonner|Empoisser|Empoissonner|Emporter|Empoter|Empourprer|Empoussi??rer|Empresurer|Emprisonner|Emprunter|??muler|??mulsifier|??mulsionner|Encager|Encabaner|Encadrer|Encagouler|Encaisser|Encanailler|Encaper|Encapsuler|Encapuchonner|Encaquer|Encarrer|Encarter|Encartonner|Encartoucher|Encaserner|Encastrer|Encaustiquer|Encaver|Enceinter|Encelluler|Encenser|Encercler|Encha??ner|Enchanteler|Enchanter|Enchaperonner|Encharner|Ench??sser|Enchatonner|Enchausser|Enchemiser|Enchetarder|Enchevaucher|Enchev??trer|Enchifrener|Enchtiber|Enchtourber|Encirer|Enclaver|Enclencher|Encliqueter|Enclo??trer|Encloquer|Enclouer|Encocher|Encoder|Encoffrer|Encoller|Encombrer|Encorder|Encorner|Encourager|Encrer|Encrasser|Encr??per|Encrister|Encro??ter|Enculer|Encuver|Endauber|Endenter|Endetter|Endeuiller|End??ver|Endiabler|Endiguer|Endimancher|Endivisionner|Endoctriner|Endommager|Endosser|Endurer|??nerver|Enfa??ter|Enfanter|Enfariner|Enfermer|Enferrer|Enfi??vrer|Enficher|Enfieller|Enfiler|Enfl??cher|Enfler|Enflammer|Enfleurer|Enfoirer|Enfoncer|Enfouiller|Enfourailler|Enfourcher|Enfourner|Enfumer|Enf??ter|Enfutailler|Engager|Engainer|Engamer|Engargousser|Engaver|Engazonner|Engendrer|Engerber|Englacer|Englober|Engluer|Engober|Engommer|Engoncer|Engorger|Engouffrer|Engouler|Engrener|Engraisser|Engranger|Engraver|Engrosser|Engrumeler|Engueuler|Enguirlander|Enharnacher|Enherber|??nieller|Enivrer|Enjamber|Enjaveler|Enj??ler|Enjoliver|Enjoncer|Enjouer|Enjuguer|Enjuponner|Enlever|Enlier|Enlacer|Enliasser|Enligner|Enliser|Enluminer|Ennuyer|Ennuager|??noncer|Enouer|Enqu??ter|Enquiller|Enquiquiner|Enrayer|Enrager|Enraciner|Enrailler|Enr??gimenter|Enregistrer|Enrener|Enr??siner|Enrhumer|Enrober|Enrocher|Enr??ler|Enrouer|Enrouiller|Enrouler|Enrubanner|Ensabler|Ensaboter|Ensacher|Ensaisiner|Ensanglanter|Ensauvager|Enseigner|Ensemencer|Enserrer|Ensiler|Ensoleiller|Ensorceler|Ensoufrer|Enst??rer|Ensuquer|Enter|Entabler|Entacher|Entailler|Entamer|Entaquer|Entarter|Entartrer|Entasser|Ent??n??brer|Ent??riner|Enterrer|Ent??ter|Enthousiasmer|Enticher|Entifler|Entoiler|Ent??ler|Entonner|Entorser|Entortiller|Entourer|Entourlouper|Entrer|Entra??ner|Entraver|Entre-heurter|Entreb??iller|Entrechoquer|Entrecouper|Entrecroiser|Entrelacer|Entrelarder|Entrem??ler|Entreposer|Entretoiser|Entrevo??ter|Entuber|??nucl??er|??num??rer|Envier|Envoyer|Envaser|Envelopper|Envenimer|Enverger|Enverguer|Enviander|Envider|Environner|Envisager|Envo??ter|??peler|??pier|??paler|??pamprer|??pancher|??panneler|??panner|??pargner|??parpiller|??pastrouiller|??pater|??paufrer|??pauler|??p??piner|??peronner|??peuler|??peurer|??picer|??pierrer|??piler|??piloguer|??pincer|??piner|??pinceler|??pinceter|??pingler|??pisser|??ployer|??plucher|??pointer|??ponger|??pontiller|??pouiller|??poumoner|??pouser|??pousseter|??poustoufler|??poutier|??pouvanter|??prouver|??pucer|??puiser|??purer|??querrer|??queuter|??quilibrer|??quiper|??quipoller|??quivoquer|??rayer|??radiquer|??rafler|??railler|??reinter|Ergoter|??riger|??roder|??rotiser|Errer|??ructer|Esbroufer|Escalader|Escamoter|Escarmoucher|Escarper|Escarrifier|Escher|Esclavager|Escobarder|Escoffier|Escompter|Escorter|Escrimer|Escroquer|Esgourder|Esp??rer|Espacer|Espalmer|Espionner|Espoliner|Espouliner|Esquicher|Esquinter|Esquisser|Esquiver|Essayer|Essaimer|Essanger|Essarter|Esseuler|Essorer|Essoriller|Essoucher|Essouffler|Essuyer|Estamper|Estampiller|Est??rifier|Esth??tiser|Estimer|Estiver|Estocader|Estomaquer|Estomper|Estoquer|Estrapader|Estrapasser|Estropier|??tayer|??tager|??tabler|??taler|??talager|??talinguer|??talonner|??tamer|??tamper|??tancher|??tan??onner|??tarquer|??tatiser|??terniser|??ternuer|??t??ter|??th??rifier|??th??riser|??thniciser|??tinceler|??tioler|??tiqueter|??tirer|??toffer|??toiler|??tonner|??touffer|??touper|??toupiller|??trangler|??traper|??trenner|??tr??sillonner|??triller|??triper|??tripailler|??triquer|??tron??onner|??tudier|??tuver|Euphoriser|Europ??aniser|??vacuer|??valuer|??vang??liser|??vaporer|??vaser|??veiller|??venter|??ventrer|??vider|??vincer|??viter|??voluer|??voquer|Ex??crer|Exacerber|Exag??rer|Exalter|Examiner|Exasp??rer|Exaucer|Exc??der|Excaver|Exceller|Excentrer|Excepter|Exciper|Exciser|Exciter|Excommunier|Excorier|Excr??ter|Excracher|Excursionner|Excuser|Ex??cuter|Exemplifier|Exempter|Exercer|Exfiltrer|Exfolier|Exhaler|Exhausser|Exh??r??der|Exhiber|Exhorter|Exhumer|Exiger|Exiler|Exister|Exon??rer|Exorciser|Expier|Expatrier|Expectorer|Exp??dier|Exp??rimenter|Expertiser|Expirer|Expliciter|Expliquer|Exploiter|Explorer|Exploser|Exporter|Exposer|Exprimer|Exproprier|Expulser|Expurger|Exsuder|Ext??nuer|Ext??rioriser|Exterminer|Externer|Externaliser|Extirper|Extorquer|Extourner|Extrader|Extrapoler|Extravaguer|Extravaser|Extruder|Exulc??rer|Exulter|Fier|Fabriquer|Fabuler|Facetter|F??cher|Faciliter|Fa??onner|Factoriser|Facturer|Fader|Fagoter|Faignanter|Fain??anter|Fain??antiser|Faisander|Faloter|Falsifier|Faluner|Familiariser|Faner|Fanatiser|Fanfaronner|Fanfrelucher|Fantasmer|Faonner|Farder|Farfouiller|Farguer|Fariner|Farter|Faseyer|Fasier|Fasciner|Fasciser|Fatiguer|Fatrasser|Faub??rer|Faucarder|Faucher|Fauciller|Fauconner|Faufiler|Fausser|Fauter|Favoriser|Faxer|Fayoter|F??conder|F??culer|F??d??rer|F??d??raliser|Feignanter|Feinter|F??ler|F??liciter|F??miniser|Fendiller|Fenestrer|Fen??trer|Ferler|Fermer|Fermenter|Ferrer|Ferrailler|Ferrouter|Fertiliser|Fesser|Festiner|Festoyer|Festonner|F??ter|F??ticher|F??tichiser|Feuiller|Feuilleter|Feuilletiser|Feuler|Feutrer|Figer|Fiabiliser|Fiancer|Ficeler|Ficher|Fid??liser|Fieffer|Fienter|Fignoler|Figurer|Filer|Fileter|Filialiser|Filigraner|Filmer|Filocher|Filouter|Filtrer|Finaliser|Financer|Financiariser|Finasser|Finlandiser|Fiscaliser|Fissionner|Fissurer|Fixer|Fl??cher|Flageller|Flageoler|Flagorner|Flairer|Flamber|Flamboyer|Fl??ner|Flancher|Fl??nocher|Flanquer|Flaquer|Flasher|Flatter|Flauper|Flemmarder|Fleurer|Flexibiliser|Flibuster|Flingoter|Flinguer|Flipper|Fliquer|Flirter|Floconner|Floculer|Floquer|Flotter|Flouer|Flouser|Fluer|Fluber|Fluctuer|Fluidifier|Fluidiser|Fluoriser|Flurer|Fl??ter|Fluxer|Focaliser|Foirer|Foisonner|Fol??trer|Folichonner|Folioter|Folkloriser|Fomenter|Foncer|Fonctionner|Fonctionnariser|Fonder|Forcer|Forer|Forger|Forjeter|Forlancer|Forligner|Forlonger|Former|Formaliser|Formater|Formicaliser|Formoler|Formuler|Forniquer|Fortifier|Fossiliser|Fossoyer|Fouger|Fouailler|Fouder|Foudroyer|Fouetter|Fouiller|Fouiner|Fouler|Fourailler|Fourber|Fourcher|Fourgonner|Fourguer|Fourmiller|Fourrer|Fourrager|Fourvoyer|Frayer|Fr??ter|Fracasser|Fractionner|Fracturer|Fragiliser|Fragmenter|Fraiser|Framboiser|Franger|Franchiser|Franciser|Francophoniser|Fransquillonner|Frapper|Fraterniser|Frauder|Fredonner|Fr??gater|Freiner|Frelater|Fr??quenter|Fr??tiller|Fretter|Fricasser|Fricoter|Frictionner|Frigorifier|Frigorifuger|Frimer|Fringuer|Friper|Friponner|Friquer|Friser|Frisotter|Frissonner|Fristouiller|Fritter|Froisser|Fr??ler|Froncer|Fronder|Frotter|Frouer|Froufrouter|Frousser|Fructifier|Frusquer|Frustrer|Fuguer|Fuiter|Fulgurer|Fulminer|Fumer|Fumiger|Fureter|Fuseler|Fuser|Fusiller|Fusionner|Fustiger|Geler|G??rer|Gager|Gabarier|Gabionner|G??cher|Gadg??tiser|Gaffer|Gafouiller|Gagner|Gainer|Gal??jer|Gal??rer|Galantiser|Galber|Galipoter|Galonner|Galoper|Galvaniser|Galvauder|Gameler|Gambader|Gamberger|Gambiller|Gaminer|Gangrener|Gangr??ner|Ganser|Ganter|Garer|Garancer|Garder|Gargoter|Gargouiller|Garrotter|Gasconner|Gaspiller|G??ter|G??tifier|Gaufrer|Gauler|Gaver|Gazer|Gaz??ifier|Gazonner|Gazouiller|G??latiner|G??latiniser|G??lifier|G??miner|Gemmer|Gener|Gen??rer|G??n??raliser|G??om??triser|Gercer|Gerber|Germer|Germaniser|Gesticuler|Giboyer|Gicler|Gifler|Gigoter|Gironner|Girouetter|G??ter|Givrer|Glacer|Glaglater|Glairer|Glaiser|Glaner|Glander|Glandouiller|Glavioter|Glaviotter|Gl??ner|Gletter|Glisser|Globaliser|Glorifier|Gloser|Glouglouter|Glousser|Gloutonner|Glyc??riner|Gngner|Goaler|Gober|Gobeter|Gobelotter|Goder|Godailler|Godiller|Godronner|Goguenarder|Goinfrer|Gommer|Gomorrhiser|Gonder|Gondoler|Gonfler|Gongonner|Gorger|Gouacher|Gouailler|Goualer|Gouaper|Goudronner|Gouger|Gougnoter|Gougnotter|Goujonner|Goupiller|Goupillonner|Gourmer|Gourmander|Go??ter|Goutter|Gouttiner|Gouverner|Gr??er|Grener|Gr??ser|Grever|Gr??ver|Gracier|Graduer|Graffiter|Grafigner|Grailler|Graillonner|Graisser|Gramer|Grammaticaliser|Graniter|Granuler|Graphiter|Grappiller|Grasseyer|Graticuler|Gratifier|Gratiner|Gratouiller|Gratter|Grattouiller|Graver|Gravillonner|Graviter|Greciser|Grecquer|Greffer|Gr??ler|Grelotter|Greneler|Grenailler|Grenouiller|Gr??siller|Gribouiller|Griffer|Griffonner|Grignoter|Grigriser|Griller|Grillager|Grimer|Grimacer|Grimper|Grincer|Grincher|Gripper|Griser|Grisailler|Grisoler|Grisoller|Grisonner|Griveler|Grmguer|Grogner|Grognasser|Grognonner|Grommeler|Gronder|Grossoyer|Grouiller|Gro??ler|Groumer|Grouper|Gruger|Gu??er|Guerroyer|Gu??trer|Guetter|Gueuler|Gueuletonner|Gueuser|Guider|Guigner|Guillemeter|Guillocher|Guillotiner|Guincher|Guinder|Guindailler|Guiper|H??ler|Habiliter|Habiller|Habiter|Habituer|H??bler|Hacher|Hachurer|Halener|Haler|H??ler|Haleter|Halbrener|Halkiner|Halluciner|Hame??onner|Hancher|Handeler|Handicaper|Hannetonner|Hanter|Happer|Haranguer|Harasser|Harceler|Harder|Haricoter|Harmoniser|Harnacher|Harper|Harpailler|Harponner|Hasarder|H??ter|Haubaner|Hausser|Haver|H??b??ter|H??berger|H??bra??ser|H??litreuiller|Hell??niser|Herber|Herbager|Herbeiller|Herboriser|Hercher|H??risser|H??rissonner|H??riter|Herser|H??siter|Heurter|Hiberner|Hi??rarchiser|Hisser|Historier|Hiverner|Hocher|Holographier|Homog??n??ifier|Homog??n??iser|Homologuer|Hongrer|Hongroyer|Honorer|Hoqueter|Horrifier|Horripiler|Hospitaliser|Houer|Houblonner|Houper|Houpper|Hourailler|Hourder|Houspiller|Housser|Houssiner|Huer|Hucher|Huiler|Hululer|Humer|Humaniser|Humecter|Humidifier|Humilier|Hurler|Hybrider|Hydrater|Hydrofuger|Hydrog??ner|Hydrolyser|Hypertrophier|Hypnotiser|Hypostasier|Hypoth??quer|Iconiser|Id??aliser|Identifier|Id??ologiser|Idiotiser|Idol??trer|Ignifuger|Ignorer|Illuminer|Illusionner|Illustrer|Imager|Imaginer|Imbiber|Imbriquer|Imiter|Immat??rialiser|Immatriculer|Immerger|Immigrer|Immobiliser|Immoler|Immortaliser|Immuniser|Imp??trer|Impacter|Impatienter|Impatroniser|Imperm??abiliser|Implanter|Impl??menter|Impliquer|Implorer|Imploser|Importer|Importuner|Imposer|Impr??gner|Impressionner|Imprimer??mprouver|Improviser|Impulser|Imputer|Inactiver|Inaugurer|Incarc??rer|Incarner|Incendier|Incin??rer|Inciser|Inciter|Incliner|Incomber|Incommoder|Incorporer|Incr??menter|Incriminer|Incruster|Incuber|Inculper|Inculquer|Incurver|Indaguer|Indemniser|Indexer|Indicer|Indiff??rer|Indigner|Indiquer|Indisposer|Individualiser|Indulgencier|Indurer|Industrialiser|Inf??rer|Infantiliser|Infatuer|Infecter|Inf??oder|Inf??rioriser|Infester|Infibuler|Infiltrer|Infirmer|Infliger|Influer|Influencer|Informer|Informatiser|Infuser|Ing??rer|Ingurgiter|Inhaler|Inhiber|Inhumer|Initier|Initialer|Initialiser|Injecter|Injurier|Innerver|Innocenter|Innover|Inoculer|Inonder|Inqui??ter|Ins??rer|Insculper|Ins??miner|Insensibiliser|Insinuer|Insister|Insoler|Insolubiliser|Insonoriser|Inspecter|Inspirer|Installer|Instaurer|Instiguer|Instiller|Instituer|Institutionnaliser|Instrumenter|Instrumentaliser|Insuffler|Insulter|Insupporter|Int??grer|Intailler|Intellectualiser|Intensifier|Intenter|Interc??der|Intercaler|Intercepter|Interclasser|Interconnecter|Int??resser|Interf??rer|Interfolier|Int??rioriser|Interjeter|Interligner|Interloquer|Interner|Internationaliser|Interpeller|Interpoler|Interposer|Interpr??ter|Interroger|Interviewer|Intimer|Intimider|Intituler|Intoxiquer|Intriguer|Intriquer|Introniser|Intuber|Inutiliser|Invalider|Invectiver|Inventer|Inventorier|Inverser|Inviter|Invoquer|Ioder|Iodler|Ioniser|Iouler|Iriser|Ironiser|Irradier|Irriguer|Irriter|Islamiser|Isoler|It??rer|Italianiser|Ivoiriser|Ixer|Jeter|Jabler|Jaboter|Jacasser|Jach??rer|Jacter|Jaffer|Jalonner|Jalouser|Jambonner|Japoniser|Japonner|Japper|Jardiner|Jargonner|Jarreter|Jaser|Jasper|Jaspmer|Jauger|Javeler|Javer|Javelliser|Je??ner|Jobarder|Jocoler|Jodler|Jogger|Jointoyer|Joncer|Joncher|Jongler|Jouer|Jouailler|Jouter|Jouxter|Juger|Jubiler|Jucher|Juda??ser|Juguler|Jumeler|Juponner|Jurer|Justicier|Justifier|Juter|Juxtaposer|Kaoter|Kaotiser|K??ratiniser|Kidnapper|Kilom??trer|Klaxonner|Koter|Layer|L??cher|L??guer|L??ser|Lever|Lier|Lacer|Labelliser|Labialiser|Labourer|Lac??rer|Lacaniser|L??cher|La??ciser|Lainer|Laisser|Laitonner|La??usser|Lamer|Lambiner|Lambrisser|Lamenter|Laminer|Lamper|Lancer|Langer|Lancequiner|Lanciner|Langueyer|Lansquiner|Lanterner|Laper|Lapider|Lapidifier|Lapiner|Laquer|Larder|Lardonner|Larguer|Larmoyer|Lasser|Latiniser|Latter|Laver|L??galiser|L??gender|L??gif??rer|L??gitimer|Lemmatiser|L??nifier|L??siner|Lessiver|Lester|Leurrer|L??viger|L??viter|Levretter|L??zarder|Li??ger|Liaisonner|Liarder|Lib??rer|Libeller|Lib??raliser|Licencier|Licher|Lichetrogner|Liciter|Lifter|Ligaturer|Ligner|Ligoter|Liguer|Limer|Limander|Limiter|Limoger|Limoner|Limousiner|Linger|Liqu??fier|Liquider|Liserer|Lis??rer|Lisbroquer|Lisser|Lister|Liter|Lithographier|Litroner|Livrer|Loger|Lober|Lobotomiser|Localiser|Locher|Lock-outer|Lockouter|Lofer|Loguer|Longer|Looser|Loquer|Lorgner|Lotionner|Louer|Louanger|Loucher|Loufer|Louper|Louquer|Lourer|Lourder|Louver|Louveter|Louvoyer|Lover|Luger|Lubrifier|Luncher|Lustrer|Luter|Lutiner|Lutter|Luxer|Lyncher|Lyophiliser|Lyrer|Lyser|M??cher|Mener|M??trer|Mac??rer|Macadamiser|M??cher|Machicoter|Machiner|M??chonner|M??chouiller|M??churer|Macler|Ma??onner|Macquer|Maculer|Mad??fier|Mad??riser|Madrigaliser|Maganer|Magasiner|Magn??tiser|Magn??toscoper|Magnifier|Magoter|Magouiller|Mailler|Ma??triser|Majorer|Malaxer|Mall??abiliser|Mallouser|Malmener|Malter|Maltraiter|Malverser|Mamelonner|Man??ger|Manger|Manier|Manager|Manchonner|Mander|Mandater|Mangeotter|Mani??rer|Manifester|Manigancer|Manipuler|Mannequmer|Man??uvrer|Manoquer|Manquer|Mansarder|Manucurer|Manufacturer|Manutentionner|Mapper|Maquer|Maquetter|Maquignonner|Maquiller|Marger|Marier|Marabouter|Maratoner|Marauder|Maraver|Marbrer|Marcher|Marchander|Marcotter|Margauder|Marginer|Marginaliser|Margoter|Margotter|Mariner|Marivauder|Marmiter|Marmonner|Marmoriser|Marmotter|Marner|Maronner|Maroquiner|Maroufler|Marquer|Marqueter|Marronner|Marsouiner|Marteler|Martyriser|Marxiser|Masculiniser|Masquer|Masser|Massacrer|Massicoter|Massifier|Mast??guer|Mastiquer|Masturber|Mater|M??ter|Matabicher|Matcher|Matelasser|Mat??rialiser|Materner|Materniser|Math??matiser|M??tiner|Matouser|Matraquer|Matricer|Matriculer|Maturer|Maugr??er|Maximaliser|Maximiser|Mazouter|M??caniser|M??contenter|M??dailler|M??diatiser|M??dicaliser|M??dicamenter|M??diser|M??diter|M??duser|Megisser|M??goter|M??juger|M??ler|M??langer|M??moriser|Menacer|M??nager|Mendier|Mendigoter|Menotter|Mensualiser|Mensurer|Mentionner|Menuiser|M??priser|Mercantiliser|Merceriser|Merder|Merdoyer|Meringuer|M??riter|M??sallier|M??sestimer|Mesurer|M??suser|M??taboliser|M??talliser|M??tamorphiser|M??tamorphoser|M??taphoriser|M??t??oriser|M??tisser|Meubler|Meugler|Meuler|Miauler|Michetonner|Microfilmer|Microniser|Mignarder|Mignoter|Migrer|Mijoler|Mijoter|Militer|Militariser|Mill??simer|Mimer|Miner|Minauder|Min??raliser|Miniaturer|Miniaturiser|Minimiser|Minorer|Minuter|Mirer|Miroiter|Miser|Mis??rer|Miter|Mitarder|Mithridatiser|Mitiger|Mitonner|Mitrailler|Mixer|Mixtionner|Mobiliser|Modeler|Mod??rer|Mod??liser|Moderniser|Modifier|Moduler|Mofler|Moirer|Moiser|Moissonner|Moiter|Moleter|Molester|Mollarder|Molletonner|Momifier|Monder|Mondialiser|Mon??tiser|Monnayer|Monologuer|Monopoliser|Monseigneuriser|Monter|Montrer|Moquer|Moquetter|Moraliser|Morceler|Mordancer|Mordiller|Mordorer|Morfaler|Morfiler|Morfler|Morig??ner|Mornifler|Mortaiser|Mortifier|Motamoter|Motionner|Motiver|Motoriser|Moueter|Moucher|Moucheter|Moucharder|Moucheronner|Mouetter|Moufeter|Moufter|Mouiller|Mouler|Mouliner|Moulurer|Mouronner|Mousser|Moutonner|Mouver|Mouvementer|Moyenner|Muer|Mucher|Mugueter|Muloter|Multiplier|Multiplexer|Municipaliser|Munitionner|Murer|Murailler|Murmurer|Museler|Muser|Musarder|Muscler|Musiquer|Musquer|Musser|Muter|Mutiler|Mutualiser|Mystifier|Mythifier|Nier|Nager|Nacrer|Nanifier|Napper|Narguer|Narrer|Nasaliser|Nasarder|Nasiller|Natchaver|Nationaliser|Natter|Naturaliser|Naufrager|Naviguer|Navrer|N??antiser|N??cessiter|N??croser|N??gliger|N??gocier|N??grifier|Neiger|Neigeoter|Nerver|Nervurer|Nettoyer|Neutraliser|Niaiser|Nicher|Nickeler|Nicotiniser|Nidifier|Nieller|Nigauder|Nig??rianiser|Nimber|Nipper|Nitrer|Nitrater|Nitrifier|Nitrurer|Niveler|Nivaquiner|Nocer|Noyer|Nobscuriter|Noliser|Nomadiser|Nombrer|Nominaliser|Nommer|Noncer|Noper|Normaliser|Noter|Notifier|Nouer|Nover|Noyauter|Nuer|Nuancer|Nucl??er|Nucl??ariser|Num??riser|Num??roter|Ob??rer|Objecter|Objectiver|Objurguer|Obliger|Obliquer|Oblit??rer|Obnubiler|Obombrer|Obs??der|Observer|Obstruer|Obtemp??rer|Obturer|Obvier|Occasionner|Occidentaliser|Occulter|Occuper|Ocrer|Octavier|Octroyer|Octupler??illetonner??uvrer|Offenser|Officier|Officialiser|Offusquer|Oiseler|Ombrer|Ombrager|Ondoyer|Onduler|Op??rer|Opacifier|Opaliser|Opiacer|Opiner|Opposer|Oppresser|Opprimer|Opter|Optimaliser|Optimiser|Oraliser|Oranger|Orbiter|Orchestrer|Ordonner|Ordonnancer|Organiser|Organsmer|Orienter|Oringuer|Orner|Ornementer|Orthographier|Oser|Osciller|Ossifier|Ostraciser??ter|Ouater|Ouatiner|Oublier|Ouiller|Ourler|Outiller|Outrer|Outrager|Outrepasser|Ouvrer|Ouvrager|Ovaliser|Ovationner|Ovuler|Oxyder|Oxyg??ner|Ozoniser|Payer|P??cher|Peler|Peser|P??ter|Pager|Pacager|Pacifier|Pacquer|Pactiser|Pagayer|Pagamser|Paginer|Pailler|Pailleter|Paillarder|Paillassonner|Paillonner|Paisseler|Palabrer|Palancrer|Palangrer|Palanguer|Palanquer|Palataliser|Paleter|Palettiser|Palisser|Palissader|Palissonner|Pallier|Palmer|Paloter|Palper|Palpiter|P??mer|Paner|Panacher|Panifier|Paniquer|Panner|Panneauter|Panoramiquer|Panser|Panteler|Pantoufler|Paperasser|Papillonner|Papilloter|Papoter|Papouiller|Parer|Parier|Parachever|Parachuter|Parader|Parafer|Paraffiner|Paraisonner|Parall??liser|Paralyser|Param??trer|Parangonner|Parapher|Paraphraser|Parasiter|Parceller|Parcellariser|Parcelliser|Parcheminer|Pardonner|Parementer|Paresser|Parfiler|Parfumer|Park??riser|Parler|Parlementer|Parloter|Parodier|Parquer|Parqueter|Parrainer|Parsemer|Partager|Participer|Particulariser|Partouzer|Passer|Passementer|Passepoiler|Passionner|Pasteller|Pasteuriser|Pasticher|Pastiller|Pastiquer|Pastoriser|P??ter|Patafioler|Patauger|Pateliner|Patenter|Patienter|Patiner|P??tisser|Patoiser|Patouiller|Patrociner|Patronner|Patrouiller|Patter|P??turer|Paumer|Paumoyer|Paup??riser|Pauser|Paver|Pavoiser|Peaufiner|Peausser|P??cher|Pecquer|P??daler|P??dantiser|Peigner|Peiner|Peinturer|Peinturlurer|Peller|Pelleter|Peloter|Pelotonner|Pelucher|Pembeniser|P??n??trer|P??naliser|Pencher|Pendiller|Pendouiller|Penduler|Penser|Pensionner|Pepier|Percer|Percher|Percuter|Perdurer|P??r??griner|P??renniser|P??r??quater|Perfectionner|Perforer|Perfuser|P??ricliter|P??riphraser|Perler|Permanenter|Perm??abiliser|Permuter|Perorer|Peroxyder|Perp??trer|Perp??tuer|Perquisitionner|Pers??cuter|Pers??v??rer|Persiffler|Persifler|Persiller|Persister|Personnaliser|Personnifier|Persuader|Perturber|Pervibrer|Pessigner|Pester|Pesteller|Pestif??rer|P??tarader|P??tarder|P??tiller|Petit-d??jeuner|P??titionner|P??tocher|P??trarquiser|P??trifier|P??tuner|Peupler|Phagocyter|Phantasmer|Phaser|Philosopher|Phosphater|Phosphorer|Photocopier|Photographier|Phraser|Phrasicoter|Pi??ger|Pi??ter|Piger|Piaffer|Piailler|Pianoter|Piauler|Picoler|Picorer|Picoter|Picter|Pierrer|Pi??tiner|Pifer|Piffer|Pigeonner|Pigmenter|Pignocher|Piler|P??ler|Piller|Pilonner|Pilorier|Piloter|Piluler|Pimer|Pimenter|Pincer|Pinailler|Pindariser|Pindouler|Pingler|Pinter|Pioger|Piocher|Pioncer|Pionner|Piper|Piquer|Piqueter|Pique-niquer|Piquouser|Pirater|Pirouetter|Pisser|Pissoter|Pister|Pistonner|Piter|Pitancher|Pitonner|Pivoter|Plier|Placer|Placarder|Placoter|Plafonner|Plagier|Plaider|Plainer|Plaisanter|Planer|Plancher|Planch??ier|Planifier|Planquer|Planter|Plaquer|Plasmifier|Plastifier|Plastiquer|Plastronner|Platiner|Platiniser|Pl??trer|Pl??bisciter|Plecquer|Pleurer|Pleurnicher|Pleuvasser|Pleuviner|Pleuvioter|Pleuvoter|Plisser|Ployer|Plomber|Plonger|Ploquer|Plucher|Plumer|Plussoyer|Pluviner|Pocher|Pocheter|Podzoliser|Po??ler|Po??tiser|Pogner|Poignarder|Poin??onner|Pointer|Pointiller|Poireauter|Poiroter|Poisser|Poivrer|Polariser|Pol??miquer|Policer|Polissonner|Politiquer|Politiser|Polluer|Polycopier|Polym??riser|Pommer|Pommader|Pommeler|Pomper|Pomponner|Poncer|Ponctionner|Ponctuer|Pond??rer|Ponter|Pontifier|Pontiller|Populariser|Poquer|Porphyriser|Porter|Portraiturer|Poser|Positionner|Positiver|Poss??der|Poster|Postdater|Posticher|Postillonner|Postposer|Postsynchroniser|Postuler|Poter|Potasser|Potentialiser|Potiner|Poudrer|Poudroyer|Pouffer|Pouiller|Pouliner|Pouponner|Pourchasser|Pourl??cher|Pousser|Poutser|Prier|Praliner|Pratiquer|Pr??acheter|Preaviser|Pr??c??der|Precanser|Pr??cautionner|Pr??cher|Pr??chauffer|Pr??cipiter|Pr??ciser|Pr??compter|Pr??coniser|Pr??d??c??der|Pr??destiner|Pr??d??terminer|Pr??diquer|Pr??disposer|Pr??dominer|Pr??empter|Pr??exister|Pr??f??rer|Pr??facer|Pr??figurer|Pr??fixer|Pr??former|Pr??juger|Pr??judicier|Pr??lever|Pr??l??guer|Pr??luder|Pr??m??diter|Pr??nommer|Pr??occuper|Pr??ordonner|Pr??payer|Pr??parer|Pr??pensionner|Pr??poser|Pr??r??gler|Pr??sager|Pr??s??lectionner|Pr??senter|Pr??server|Pr??sider|Presser|Pressurer|Pressuriser|Prester|Pr??sumer|Pr??supposer|Presurer|Pr??ter|Pr??texter|Pr??variquer|Primer|Primariser|Priser|Priver|Privatiser|Privil??gier|Prober|Proc??der|Processionner|Proclamer|Procr??er|Procurer|Prodiguer|Prof??rer|Profaner|Professer|Professionnaliser|Profiler|Profiter|Programmer|Progresser|Prohiber|Projeter|Prol??tariser|Prolif??rer|Prolonger|Promener|Promotionner|Promulguer|Proner|Prononcer|Pronostiquer|Propager|Proph??tiser|Proportionner|Proposer|Propulser|Proroger|Prosa??ser|Prosodier|Prosp??rer|Prospecter|Prosterner|Prostituer|Prot??ger|Protester|Prouter|Prouver|Proverbialiser|Provigner|Provisionner|Provoquer|Pruner|Psalmodier|Psychanalyser|Psychiatriser|Puer|Publier|Puddler|Puiser|Pulluler|Pulper|Pulser|Pulv??riser|Punaiser|Purger|Purifier|Putr??fier|Pyramider|Pyrograver|Quadriller|Quadrupler|Qualifier|Quantifier|Quarderonner|Quarrer|Quarter|Quartager|Qu??mander|Quereller|Questionner|Qu??ter|Queuter|Quiller|Quimper|Quintessencier|Quintupler|Quitter|Quittancer|Quotter|Rayer|R??er|R??gler|R??gner|Rager|Rab??cher|Rabaisser|Rabanter|Rabibocher|Rabioter|Rabistoquer|R??bler|Raboter|Rabouiller|Rabouter|Rabrouer|Raccommoder|Raccompagner|Raccorder|Raccoutrer|Raccoutumer|Raccrocher|Raccuser|Raccuspoter|Racheter|Raciner|Racketter|Racler|Racoler|Raconter|Rader|Radier|Radicaliser|Radiner|Radiobaliser|Radiodiffuser|Radiographier|Radioguider|Radioscoper|Radiot??l??graphier|Radoter|Radouber|Raffiner|Raffoler|Raff??ter|Rafistoler|Rafler|Ragoter|Rago??ter|Ragr??er|Ragrafer|Raguer|Railler|Rainer|Raineter|Rainurer|Raisonner|Rajouter|Rajuster|R??ler|Ralinguer|Rallier|Rall??ger|Rallonger|Rallumer|Ramener|Ramer|Rameter|Ramager|Ramailler|Ramander|Ramarrer|Ramasser|Ramastiquer|Rambiner|Ramender|Rameuter|Ramifier|Ramoner|Ramper|Ranger|Rancarder|Ran??onner|Randonner|Ranimer|Raouster|R??per|Rapapilloter|Rapatrier|Rapetasser|Rapetisser|Rapiecer|Rapi??ceter|Rapiner|Rapipoter|Rapmer|Rappeler|Rapper|Rapparier|Rappareiller|Rappliquer|Rapporter|Rapprocher|Rappropner|Rapproprier|Rapprovisionner|Raquer|Rar??fier|Rarranger|Raser|Rassasier|Rassembler|Rass??r??ner|Rassoter|Rassurer|R??teler|Rater|Ratatiner|Ratatouiller|Ratiboiser|Ratifier|Ratiner|Ratiociner|Rationaliser|Rationner|Ratisser|Rattacher|Rattraper|Raturer|Raugmenter|Rauquer|Ravager|Ravaler|Ravauder|Ravigoter|Raviner|Ravitailler|Raviver|Rayonner|Razzier|R??abonner|R??absorber|R??accoutumer|R??activer|R??actualiser|R??adapter|R??affirmer|R??aff??ter|R??ajuster|R??al??ser|R??aliser|R??am??nager|Reamorcer|R??animer|R??apposer|Reapprovisionner|R??argenter|R??armer|R??arranger|R??assigner|R??assurer|Rebaisser|Rebander|Rebaptiser|Rebecter|Rebiquer|Reboiser|Rebonneter|Reborder|Reboucher|Rebouiser|Rebouter|Reboutonner|Rebraguetter|Rebroder|Rebrousser|Rebuter|Rec??der|Receler|Rec??ler|Rec??per|Recacheter|Recaler|Recalcifier|R??calcitrer|R??capituler|Recarder|Recarreler|Recaser|Recauser|Recenser|Recentrer|R??ceptionner|Recercler|Rechanger|Rechanter|Rechaper|R??chapper|Recharger|Rechasser|R??chauffer|Rechausser|Rechercher|Rechigner|Rechristianiser|Rechuter|R??cidiver|R??ciproquer|R??citer|R??clamer|Reclaper|Reclasser|R??cliner|Reclouer|Recoiffer|R??coler|Recoller|Recolorer|R??colter|Recommander|Recommencer|Recompenser|Recomposer|Recompter|R??concilier|Recondamner|R??conforter|Recongeler|Reconnecter|Reconsid??rer|Reconsolider|Reconstituer|Recopier|Recoquiller|Recorder|Recorriger|Recoucher|Recouper|Recouponner|Recourber|Recouvrer|R??cr??er|Recr??er|Recracher|Recreuser|R??criminer|Recristalliser|Recroiser|Recroller|Recruter|Rectifier|Reculer|Reculotter|R??cup??rer|Recurer|R??cuser|Recycler|R??darguer|Redemander|Red??marrer|R??diger|Rediffuser|R??dimer|Rediscuter|Redistribuer|Redonder|Redonner|Redorer|Redoubler|Redouter|Redresser|R????difier|R????diter|R????duquer|R??embaucher|R??employer|R??emprunter|R??engager|R??ensemencer|R??envoyer|R????quilibrer|R??escompter|R??essayer|R????valuer|R??examiner|R??exp??dier|R??exporter|R??f??rer|Refa??onner|Refaucher|R??f??rencer|Refermer|Referrer|Refeuilleter|Refiler|Refl??ter|Refluer|Reforger|Reformer|R??former|Reformuler|Refouiller|Refouler|Refourguer|Refourrer|R??fr??ner|Refr??ner|R??fracter|Refrapper|R??frig??rer|Refuser|R??futer|Regeler|Regagner|R??galer|Regarder|R??gater|Regazonner|R??g??n??rer|R??genter|Regimber|R??gionaliser|Registrer|R??glementer|Regonfler|Regorger|Regr??er|Regratter|Regreffer|R??gresser|Regretter|Regrimper|Regrouper|R??guler|R??gulariser|R??gurgiter|R??habiliter|R??habituer|Rehausser|Rehydrater|R??ifier|R??imperm??abiliser|R??implanter|R??importer|R??imposer|R??imprimer|R??incarc??rer|R??incorporer|R??infecter|R??injecter|R??ins??rer|R??installer|R??int??grer|R??interpr??ter|R??inventer|R??inviter|R??it??rer|Rejeter|Rejointoyer|Rejouer|Relayer|Rel??guer|Relever|Relier|Rel??cher|Relancer|Relater|Relativiser|Relaver|Relaxer|Reloger|Relooker|Relouer|Reluquer|Remener|Rem??cher|Remailler|Remanger|Remanier|Remaquiller|Remarier|Remarcher|Remarquer|Remastiquer|Remballer|Rembarquer|Rembarrer|Rembaucher|Rembiner|Remblayer|Remblaver|Rembobiner|Rembo??ter|Rembouger|Rembourrer|Rembourser|Rembroquer|Rembucher|Rem??dier|Rem??ler|Remembrer|Rem??morer|Remercier|Remeubler|Remilitariser|Remiser|Remmener|Remmailler|Remmailloter|Remmancher|Remodeler|Remonter|Remontrer|Remorquer|Remoucher|Remouiller|Rempailler|Rempaqueter|Remparer|Remparder|Rempi??ter|Rempiler|Remplier|Remplacer|Remployer|Remplumer|Rempocher|Rempoissonner|Remporter|Rempoter|Remprunter|Remuer|R??mun??rer|Renier|Ren??cler|Renarder|Renauder|Rencaisser|Rencarder|Rencha??ner|Rencogner|Rencontrer|Rendosser|Reneiger|R??netter|Renfa??ter|Renfermer|Renfiler|Renfler|Renflammer|Renflouer|Renfoncer|Renforcer|Rengager|Rengainer|Rengrener|Rengr??ner|Rengracier|Rengraisser|Renifler|Renommer|Renoncer|Renouer|Renouveler|R??nover|Renquiller|Renseigner|Renter|Rentabiliser|Rentamer|Rentoiler|Rentrayer|Rentrer|Renvier|Renvoyer|Renvelopper|Renvenimer|Renverger|Renverser|Renvider|R??occuper|R??op??rer|R??orchestrer|R??ordonner|R??ordonnancer|R??organiser|R??orienter|Repayer|Rep??rer|R??p??ter|Repairer|Reparer|Reparler|Repartager|Repasser|Repatiner|Repaver|Rep??cher|Repeigner|Repenser|Repercer|R??percuter|R??pertorier|Repeupler|Repincer|Repiquer|Replier|Replacer|Replanter|Repl??trer|R??pliquer|Replisser|Reployer|Replonger|Repnmer|Reporter|Reposer|Repositionner|Repousser|Repr??senter|R??primer|R??primander|Repriser|Reprocher|Reprogrammer|Reprographier|Reprouver|R??prouver|R??publicaniser|R??pudier|Repugner|R??puter|Requalifier|Requ??ter|Requinquer|R??quisitionner|Rerenvoyer|R??s??quer|Resaler|Resaluer|Rescinder|Resemer|R??server|R??sider|R??signer|R??silier|R??siner|R??sinifier|R??sister|R??sonner|R??sorber|Respecter|Respirer|Responsabiliser|Resquiller|Ressayer|Ressaigner|Ressasser|Ressauter|Ressemeler|Ressemer|Ressembler|Resserrer|Ressouder|Ressourcer|Ressuer|Ressuyer|Ressusciter|Rester|Restaurer|Restituer|Restructurer|Restyler|R??sulter|R??sumer|Retailler|R??tamer|Retaper|Retapisser|Retarder|Ret??ter|Ret??l??phoner|Retenter|Retercer|Reterser|R??ticuler|Retirer|Retisser|Retomber|Retoquer|R??torquer|Retoucher|Retourner|Retracer|R??tracter|Retraiter|Retrancher|Retravailler|Retraverser|Retremper|R??tribuer|R??troc??der|R??trograder|Retrousser|Retrouver|Retuber|R??unifier|R??utiliser|R??v??ler|R??ver|R??v??rer|Revacciner|Revalider|Revaloriser|R??vasser|R??veiller|R??veillonner|Revendiquer|R??verb??rer|Reverser|Revigorer|Revirer|R??viser|Revisiter|Revisser|Revitaliser|Revivifier|Revoler|R??volter|R??volutionner|R??volv??riser|R??voquer|Revoter|R??vulser|Rewriter|Rhabiller|Rhumer|Ribler|Ribouler|Ricaner|Ricocher|Rider|Ridiculiser|Riffauder|Rifler|Rigidifier|Rigoler|Rimer|Rimailler|Rincer|Ringarder|Rioter|Riper|Ripailler|Ripatonner|Ripoliner|Riposter|Risquer|Rissoler|Ristourner|Ritualiser|River|Riveter|Rivaliser|Rober|Robotiser|Rocher|Rocquer|Roder|R??der|R??dailler|Rogner|Rognonner|Romancer|Romaniser|Ronger|Ronchonner|Ron??oter|Ron??otyper|Ronfler|Ronflaguer|Ronronner|Ronsardiser|Roquer|Roser|Rosser|Roter|Rouer|Rouanner|Roucouler|Roufler|Rougeoyer|Rougnotter|Rouiller|Rouler|Roulotter|Roupiller|Rouscailler|Rousp??ter|Router|Ruer|Rubaner|Rub??fier|Rucher|Rudenter|Rudoyer|Rueller|Ruginer|Ruiler|Ruiner|Ruisseler|Ruminer|Rupiner|Ruser|Russifier|Rustiquer|R??ter|Rutiler|Rythmer|T??ter|Tabasser|Tabler|Tabouiser|Tabuler|Tacher|T??cher|Tacheter|Taguer|Tailler|Taillader|Taler|Taller|Talocher|Talonner|Talquer|Taluter|Tambouler|Tambouriner|Tamiser|Tamponner|Tancer|Tanguer|Taniser|Tanner|Tanniser|Taper|Tapager|Tapiner|Tapisser|Taponner|Tapoter|Taquer|Taquiner|Tarer|Tarabiscoter|Tarabuster|Tarauder|Tarder|Tarifer|Tarter|Tartiner|Tasser|T??ter|Tatillonner|T??tonner|Tatouer|Tauper|Taveler|Taveller|Taxer|Tayloriser|Tchadiser|Tchatcher|Techniciser|Techniser|Technocratiser|Tecker|Teiller|Teinter|T??l??commander|T??l??copier|T??l??diffuser|T??l??graphier|T??l??guider|T??l??m??trer|T??l??phoner|T??lescoper|T??l??viser|T??lexer|T??moigner|Temp??rer|Temp??ter|Temporiser|Tenailler|Tenonner|T??noriser|Tenter|Tercer|Tergiverser|Terminer|Terrer|Terrasser|Terreauter|Terrifier|Terroriser|Terser|Teseter|Tester|T??ter|T??taniser|Textualiser|Texturer|Texturiser|Th????traliser|Th??matiser|Th??oriser|Th??sauriser|Tictaquer|Tiercer|Tigrer|Tiller|Timbrer|Tinter|Tintinnabuler|Tiquer|Tirer|Tirailler|Tire-bouchonner|Tirebouchonner|Tiser|Tisaner|Tisonner|Tisser|Titiller|Titrer|Tituber|Titulariser|Toaster|Togoliser|Toiler|Toiletter|Toiser|Tol??rer|Tomer|Tomber|Tonifier|Tonitruer|Tonner|Tonsurer|Tontiner|Toper|Topicaliser|Toquer|Tor??er|Torcher|Torchonner|Toronner|Torpiller|Torr??fier|Torsader|Tortiller|Tortorer|Torturer|Tosser|Totaliser|Touer|Toubabiser|Toucher|Touiller|Toupiller|Toupiner|Tourber|Tourbillonner|Tourillonner|Tourmenter|Tourner|Tournailler|Tournasser|Tournebouler|Tournicoter|Tourniller|Tourniquer|Tournoyer|Tousser|Toussailler|Toussoter|Touter|Trier|Tracer|Trabouler|Tracaner|Tracasser|Tracter|Traficoter|Trafiquer|Tra??ner|Tra??nailler|Tra??nasser|Traiter|Tramer|Trancher|Tranchefiler|Tranquilliser|Transbahuter|Transborder|Transcender|Transcoder|Transf??rer|Transfigurer|Transfiler|Transformer|Transfuser|Transgresser|Transhumer|Transiger|Transistoriser|Transiter|Translater|Translitt??rer|Transmigrer|Transmuer|Transmuter|Transpercer|Transpirer|Transplanter|Transporter|Transposer|Transsubstantier|Transsuder|Transvaser|Transvider|Traquer|Traumatiser|Travailler|Travailloter|Traverser|Tr??bucher|Tr??filer|Treillager|Treillisser|Tr??mater|Trembler|Trembloter|Tremper|Tr??muler|Tr??paner|Tr??passer|Tr??pider|Tr??pigner|Tresser|Tressauter|Treuiller|Tr??virer|Trianguler|Triballer|Tricher|Tricocher|Tricoter|Trifouiller|Triller|Trimer|Trimarder|Trimbaler|Trimballer|Tringler|Trinquer|Triompher|Tripatouiller|Tripler|Tripoter|Triquer|Tris??quer|Trisser|Triturer|Troler|Tromper|Trompeter|Tr??ner|Tron??onner|Tronquer|Tropicaliser|Troquer|Trotter|Trottiner|Trouer|Troubler|Trouilloter|Trousser|Troussequiner|Trouver|Truander|Trucider|Truffer|Truquer|Trusquiner|Truster|Tuer|Tuber|Tuberculiner|Tuberculiniser|Tuberculiser|Tuder|Tuiler|Tum??fier|Turbiner|Turlupiner|Turluter|T??teler|T??ter|Tuteurer|Tutoyer|Tutorer|Tututer|Tuyauter|Twister|Tympaniser|Typer|Typiser|Typographier|Tyranniser|Ulc??rer|Ululer|Unifier|Uniformiser|Universaliser|Urger|Urbaniser|Uriner|User|Usiner|Usurper|Utiliser|Vacciner|Vaciller|Vacuoliser|Vadrouiller|Vagabonder|Vaguer|Vaironner|Valeter|Valdinguer|Valider|Valiser|Valoriser|Valouser|Valser|Vamper|Vampiriser|Vandaliser|Vanner|Vanter|Vaporiser|Vaquer|Varier|Varapper|Varloper|Vaser|Vaseliner|Vasouiller|Vassaliser|Vaticiner|V??g??ter|V??hiculer|Veiller|Veiner|V??ler|V??lariser|Velouter|V??n??rer|Venger|Vendanger|Venter|Ventiler|Ventouser|Verbaliser|Verbiager|Verdoyer|Verduniser|Verger|Verglacer|V??rifier|Verjuter|Vermiculer|Vermiller|Vermillonner|Vernisser|Verrouiller|Verser|Versifier|Vesser|V??tiller|Vexer|Viabiliser|Viander|Vibrer|Vibrionner|Vicier|Vider|Vidanger|Vidimer|Vieller|Vigiler|Vilipender|Vill??giaturer|Viner|Vinaigrer|Vinifier|Violer|Violacer|Violenter|Violoner|Virer|Virevolter|Virguler|Viriliser|Viroler|Viser|Visionner|Visiter|Visser|Visualiser|Vitrer|Vitrifier|Vitrioler|Vitup??rer|Vivifier|Vivoter|Vmer|Vocaliser|Vocif??rer|Voguer|Voiler|Voisiner|Voiturer|Voler|Voleter|Volatiliser|Volcaniser|Voliger|Volleyer|Volter|Voltiger|Voter|Vouer|Vousoyer|Voussoyer|Vo??ter|Vouvoyer|Voyager|Vriller|Vulcaniser|Vulganiser|Vulgariser|Warranter|Week-ender|Wolophiser|Yailler|Yodiser|Yoper|Yoyoter|Z??brer|Za??rianiser|Zapper|Zerver|Zester|Z??zayer|Ziber|Zieuter|Zigouiller|Ziguer|Zigzaguer|Zinguer|Zinzinuler|Zipper|Zoner|Zonzonner|Zoomer|Zouaver|Zouker|Zozoter|Z??ner|Zwanzer|Zyeuter/i;

    var reg_verbe_second=/Abalourdir|Abasourdir|Ab??tardir|Ab??tir|Abolir|Abonnir|Aboutir|Abrutir|Accomplir|Accourcir|Adoucir|Affadir|Affaiblir|Affermir|Affranchir|Agir|Agonir|Agrandir|Aguerrir|Ahurir|Aigrir|Alanguir|Alentir|All??gir|Alourdir|Alunir|Amaigrir|Amatir|Amerrir|Ameublir|Amincir|Amoindrir|Amollir|Amortir|An??antir|Anoblir|Anordir|Aplanir|Aplatir|Appauvrir|Appesantir|Applaudir|Appointir|Approfondir|Arrondir|Assagir|Assainir|Asservir|Assombrir|Assortir|Assoupir|Assouplir|Assourdir|Assouvir|Assujettir|Attendrir|Atterrir|Atti??dir|Avachir|Avertir|Aveulir|Avilir|Bannir|Barrir|B??tir|Baudir|B??nir|Blanchir|Bl??mir|Blettir|Bleuir|Blondir|Bonir|Bondir|Bonnir|Bouffir|Brandir|Brouir|Brunir|Calmir|Catir|Chancir|Chauvir|Ch??rir|Choisir|Clapir|Compatir|Conir|Convertir|Cotir|Cr??pir|Cr??nir|Crounir|Croupir|D??b??tir|D??bleuir|D??brutir|D??catir|D??cr??pir|D??finir|D??fl??chir|D??fleurir|D??fra??chir|D??garnir|D??gauchir|D??glutir|D??gourdir|D??grossir|D??guerpir|D??jaunir|D??maigrir|D??molir|D??munir|D??nantir|D??noircir|D??p??rir|D??polir|D??raidir|D??rondir|D??rougir|D??sassortir|D??semplir|D??sengourdir|D??senlaidir|D??s??paissir|D??s??tablir|D??sinvestir|D??sob??ir|Dessaisir|Dessertir|D??sunir|D??verdir|D??vernir|Divertir|Doucir|Durcir??bahir??baubir??baudir??blouir??catir??champir??claircir??crouir|Effleurir??largir??l??gir|Embellir|Emboutir|Embrunir|Emplir|Empuantir|Ench??rir|Endolorir|Endurcir|Enforcir|Enfouir|Engloutir|Engourdir|Enhardir|Enlaidir|Ennoblir|Enorgueillir|Enrichir|Ensevelir|Envahir|Envieillir??paissir??panouir??poutir??quarrir|Estourbir??tablir??tourdir??tr??cir|Faiblir|Farcir|Finir|Fl??chir|Fl??trir|Fleurir|Forcir|Fouir|Fourbir|Fournir|Fra??chir|Franchir|Fr??mir|Froidir|Garantir|Garnir|Gauchir|G??mir|Glapir|Glatir|Grandir|Gravir|Grossir|Gu??rir|Ha??r|Havir|Hennir|Honnir|Hourdir|Impartir|Infl??chir|Interagir|Intervertir|Invertir|Investir|Jaillir|Jaunir|Jouir|Languir|Lotir|Louchir|Maigrir|Matir|M??gir|Meurtrir|Mincir|Moisir|Moitir|Mollir|Mugir|Munir|M??rir|Nantir|Noircir|Nordir|Nourrir|Ob??ir|Obscurcir|Ourdir|P??lir|P??tir|P??rir|Pervertir|P??trir|Polir|Pourrir|Pr????tablir|Pr??finir|Pr??munir|Punir|Rab??tir|Rabonnir|Rabougrir|Raccourcir|Racornir|Radoucir|Rafantir|Raffermir|Rafra??chir|Ragaillardir|Ragrandir|Raidir|Rajeunir|Ralentir|Ramollir|Rancir|Raplatir|Rapointir|Rappointir|Rassortir|Ravir|Ravilir|R??agir|R??assortir|Reb??tir|Rebaudir|Reblanchir|Rebondir|Rechampir|R??champir|Reconvertir|Recr??pir|Red??finir|Red??molir|R??fl??chir|Refleurir|Refroidir|R??gir|Regarnir|Regrossir|R??investir|Rejaillir|R??jouir|R??largir|Rembrunir|Remplir|Rench??rir|Rendurcir|Renformir|R??partir|Repolir|Resalir|Resplendir|Ressaisir|Ressurgir|Resurgir|R??tablir|Retentir|R??tr??cir|R??troagir|R??unir|R??ussir|Reverdir|Revernir|Revomir|Roidir|Rondir|Rosir|R??tir|Rouir|Rougir|Roussir|Roustir|Rugir|Saisir|Salir|Saurir|Serfouir|Sertir|S??vir|Sous-investir|Subir|Subvertir|Superfinir|Surir|Surench??rir|Surfleurir|Surgir|Surinvestir|Tarir|Tartir|Ternir|Terrir|Ti??dir|Trahir|Transir|Travestir|Unir|Vagir|Verdir|Vernir|Vieillir|Vioquir|Vomir|Vrombir/i;

    var reg_verbe_troisieme = /abattre|absoudre|abstraire|accourir|accro??tre|accueillir|acqu??rir|adjoindre|admettre|advenir|aller|apercevoir|appara??tre|appartenir|appendre|apprendre|assaillir|astreindre|atteindre|attendre|avenir|avoir|battre|boire|bouillir|braire|bruire|ceindre|choir|circoncire|circonscrire|circonvenir|clore|combattre|commettre|compara??tre|complaire|comprendre|compromettre|concevoir|conclure|concourir|condescendre|conduire|confire|confondre|conjoindre|conna??tre|conqu??rir|consentir|construire|contenir|contraindre|contrebattre|contredire|contrefaire|contrefoutre|contrevenir|convaincre|convenir|correspondre|corrompre|coudre|courir|couvrir|craindre|croire|cro??tre|cueillir|cuire|d??battre|d??bouillir|d??cevoir|d??choir|d??clore|d??confire|d??coudre|d??couvrir|d??crire|d??cro??tre|cro??tre|d??cro??tre|d??dire|d??duire|d??faire|d??faillir|d??fendre|d??mentir|d??mettre|d??mordre|d??partir|d??peindre|d??pendre|d??plaire|d??pourvoir|d??prendre|d??sapprendre|descendre|desservir|d??teindre|d??tendre|d??tenir|d??tordre|d??truire|devenir|d??v??tir|devoir|dire|disconvenir|discourir|disjoindre|dispara??tre|dissoudre|distendre|distordre|distraire|dormir|??battre|??choir|??clore|??conduire|??crire|??lire|embattre|embattre|emboire|??mettre|??moudre|??mouvoir|empreindre|enceindre|enclore|encourir|endormir|enduire|enfreindre|enjoindre|enqu??rir|ensuivre|entendre|entrapercevoir|entrebattre|entre-d??truire|entre-luire|entre-nuire|entreprendre|entretenir|entrevoir|entrouvrir|??pandre|??perdre|??preindre|??prendre|??quivaloir|??teindre|??tendre|??treindre|??tre|exclure|extraire|faire|faillir|falloir|feindre|fendre|fondre|forclore|forfaire|foutre|frire|fuir|geindre|g??sir|inclure|induire|inscrire|instruire|interdire|interrompre|intervenir|introduire|joindre|lire|luire|maintenir|malfaire|m??conna??tre|m??dire|m??faire|mentir|m??prendre|messeoir|mettre|m??vendre|mordre|morfondre|moudre|mourir|mouvoir|na??tre|nuire|obtenir|obvenir|occlure|offrir|oindre|omettre|ou??r|ouvrir|pa??tre|para??tre|parcourir|parfaire|parfondre|partir|parvenir|peindre|pendre|percevoir|perdre|permettre|plaindre|plaire|pleuvoir|poindre|pondre|pourfendre|poursuivre|pourvoir|pouvoir|pr??dire|prendre|prescrire|pressentir|pr??tendre|pr??valoir|pr??venir|pr??voir|produire|promettre|promouvoir|proscrire|provenir|qu??rir|rabattre|rasseoir|r??admettre|r??appara??tre|r??apprendre|rebattre|recevoir|reclure|recompara??tre|reconduire|reconna??tre|reconqu??rir|reconstruire|recoudre|recourir|recouvrir|r??crire|recro??tre|recueillir|recuire|red??couvrir|red??faire|redescendre|redevenir|redevoir|redire|redormir|r??duire|r????crire|r????lire|r??entendre|refaire|refendre|refondre|r??inscrire|r??introduire|rejoindre|relire|reluire|remettre|remordre|remoudre|rena??tre|rendormir|rendre|renduire|rentrouvrir|repa??tre|r??pandre|repara??tre|repartir|repeindre|rependre|repentir|reperdre|repleuvoir|r??pondre|reprendre|reproduire|requ??rir|r??soudre|ressentir|resservir|ressortir|ressouvenir|restreindre|reteindre|retendre|retenir|retondre|retordre|retraduire|retraire|retranscrire|retransmettre|r??treindre|revaloir|revendre|revenir|rev??tir|rev??tir|revivre|revoir|revouloir|rire|rompre|rouvrir|saillir|s'abstenir|s'asseoir|satisfaire|savoir|secourir|s??duire|entremettre|sentir|servir|seoir|sortir|souffrir|soumettre|sourire|souscrire|sous-entendre|sous-tendre|soustraire|soutenir|souvenir|subvenir|suffire|suivre|surfaire|surprendre|surproduire|surseoir|survenir|survivre|suspendre|taire|teindre|tendre|tenir|tondre|tordre|traduire|traire|transcrire|transmettre|transpara??tre|tressaillir|vaincre|valoir|vendre|venir|v??tir|vivre|voir|vouloir/

    var reg_verbe_troisieme_imp = /abat|absoud|abstrais|accour|accro??t|accueillir|acqu??r|adjoind|admet|adviens|aller|apercevoir|appara??tre|appartiens|append|apprend|assaillir|astreind|atteind|attend|aviens|avoir|bat|boit|bouillir|brais|bruit|ceind|choir|circoncit|circonscrit|circonviens|clore|combat|commet|compara??tre|complais|comprend|compromet|concevoir|conclure|concour|condescend|conduit|confit|confond|conjoind|conna??tre|conqu??r|consent|construit|contiens|contraind|contrebat|contredit|contrefais|contrefoutre|contreviens|convaincre|conviens|correspond|corrompre|coud|cour|couvr|craind|croit|cro??t|cueillir|cuit|d??bat|d??bouillir|d??cevoir|d??choir|d??clore|d??confit|d??coud|d??couvr|d??crit|d??cro??t|cro??t|d??cro??t|d??dit|d??duit|d??fais|d??faillir|d??fend|d??ment|d??met|d??mord|d??parti|d??peind|d??pend|d??plais|d??pourvoir|d??prend|d??sapprend|descend|desservir|d??teind|d??tend|d??tiens|d??tord|d??truit|deviens|d??v??ti|devoir|dit|disconviens|discour|disjoind|dispara??tre|dissoud|distend|distord|distrais|dormir|??bat|??choir|??clore|??conduit|??crit|??lit|embat|embat|emboit|??met|??moud|??mouvoir|empreind|enceind|enclore|encour|endormir|enduit|enfreind|enjoind|enqu??r|ensuivre|entend|entrapercevoir|entrebat|entre-d??truit|entre-luit|entre-nuit|entreprend|entretiens|entrevoir|entrouvr|??pand|??perd|??preind|??prend|??quivaloir|??teind|??tend|??treind|??tre|exclure|extrais|fais|faillir|falloir|feind|fend|fond|forclore|forfais|foutre|frit|fuir|geind|g??sir|inclure|induit|inscrit|instruit|interdit|interrompre|interviens|introduit|joind|lit|luit|maintiens|malfais|m??conna??tre|m??dit|m??fais|ment|m??prend|messeoir|met|m??vend|mord|morfond|moud|mour|mouvoir|na??tre|nuit|obtiens|obviens|occlure|offr|oind|omet|ou??r|ouvr|pa??tre|para??tre|parcour|parfais|parfond|parti|parviens|peind|pend|percevoir|perd|permet|plaind|plais|pleuvoir|poind|pond|pourfend|poursuivre|pourvoir|pouvoir|pr??dit|prend|prescrit|pressent|pr??tend|pr??valoir|pr??viens|pr??voir|produit|promet|promouvoir|proscrit|proviens|qu??r|rabat|rasseoir|r??admet|r??appara??tre|r??apprend|rebat|recevoir|reclure|recompara??tre|reconduit|reconna??tre|reconqu??r|reconstruit|recoud|recour|recouvr|r??crit|recro??t|recueillir|recuit|red??couvr|red??fais|redescend|redeviens|redevoir|redit|redormir|r??duit|r????crit|r????lit|r??entend|refais|refend|refond|r??inscrit|r??introduit|rejoind|relit|reluit|remet|remord|remoud|rena??tre|rendormir|rend|renduit|rentrouvr|repa??tre|r??pand|repara??tre|reparti|repeind|repend|repent|reperd|repleuvoir|r??pond|reprend|reproduit|requ??r|r??soud|ressent|resservir|ressorti|ressouviens|restreind|reteind|retend|retiens|retond|retord|retraduit|retrais|retranscrit|retransmet|r??treind|revaloir|revend|reviens|rev??ti|rev??ti|revivre|revoir|revouloir|rit|rompre|rouvr|saillir|s'abstiens|s'asseoir|satisfais|savoir|secour|s??duit|entremet|sent|servir|seoir|sorti|souffr|soumet|sourit|souscrit|sous-entend|sous-tend|soustrais|soutiens|souviens|subviens|suffit|suivre|surfais|surprend|surproduit|surseoir|surviens|survivre|suspend|tais|teind|tend|tiens|tond|tord|traduit|trais|transcrit|transmet|transpara??tre|tressaillir|vaincre|valoir|vend|viens|v??ti|vivre|voir|vouloir/
    */
    var reg_firstspace = /^(\s)/ig;

    var reg_art_def = /^[le|la|les|l']$/i;
    var reg_art_indef = /^[un|une|des]$/i;
    var reg_art_partitif = /^[du|de]$/i;
    var reg_appartenance = /^[??|aux|au]$/i;

    var reg_name = /Jarvis/ig;
    var reg_bonjour = /^bonjour|salut|hello|hey/ig;
    var reg_cava = /??a va$|comment vas-tu|tu vas bien|comment tu vas|bien ou bien/ig;
    var reg_bien = /je vais bien|ca va bien|ca va aussi|super bien/ig;
    var reg_watisit = /C'est quoi|qu'est-ce que c'est|t'as fait quoi encore|qu'est-ce que tu as fait/ig;
    var reg_say_hello = /dis bonjour ?? (\w+)(\s\w+)?|tu pourrais dire bonjour ?? (\w+)(\s\w+)?/i;
    var reg_hour = /quelle heu|qu'elle heu|moi l'heure/i;
    var reg_date = /est le combien|quel jour/i;
    var reg_capacity = /fai[t|s] le caf??|fai[t|s] pas le caf??|pipe|faire le caf??|faire un caf??|fais-moi un caf??/i;

    var reg_etre = /^(??tait|??t??|??tais|??taient|??tiez|??tiez|es|t'es|suis|sois|sommes|??tes|sont|fus|fut|f??t|f??mes|f??tes|f??rent|sera|seras|serai|serons|serez|seront|fussent|fusses|fusse|fussiez)$/
    var reg_avoir = /^(a|ai|as|avons|avez|ont|eus|eut|e??mes|e??tes|eurent|eu|avais|avait|avions|aviez|avaient|aurai|auras|aura|aurons|aurez|auront)$/
    var reg_faire = /^(fais|fait|faisons|faites|font|fis|fit|faisais|faisait|faisions|faisiez|faisaient|ferai|feras|fera|ferons|ferez)$/
    var reg_aller = /^(vais|va|vas|allons|allez|vont|allais|allai|allait|allions|alliez|allaient|irai|iras|ira|irons|irez|iront)$/

    var order_table = new Array();
    order_table["cr??e"] = 1;//acte de cr??ation
    order_table["fais"] = 1;//acte de cr??ation
    order_table["concois"] = 1;//acte de cr??ation
    order_table["??labore"] = 1;//acte de cr??ation
    order_table["invente"] = 1;//acte de cr??ation
    order_table["produis"] = 1;//acte de cr??ation
    order_table["ajoute"] = 1;//acte de cr??ation
    order_table["modifi"] = 2;//acte de modification g??n??rale
    order_table["change"] = 2;//acte de modification g??n??rale
    order_table["transforme"] = 2;//acte de modification g??n??rale
    order_table["agrandi"] = 3;//acte d'agrandissement
    order_table["??largi"] = 3;//acte d'agrandissement
    order_table["augmente"] = 3;//acte d'agrandissement

    //var reg_pronom_etre = /(^|\s)(je|tu|elle|il|moi|toi|soi|lui|leur|leurs|eux|y|nous|vous|ils|ce|cette|??a|on|j'|t'|c'|m'|me)[\s?](??tre|??tait|??t??|??tais|??taient|??tiez|??tiez|es|t'es|suis|sois|sommes|??tes|sont|fus|fut|f??t|f??mes|f??tes|f??rent|sera|seras|serai|serons|serez|seront|fussent|fusses|fusse|fussiez)[$|\s]/ig;
    //var reg_pronom_avoir = /(^|\s)(je|tu|elle|il|moi|toi|soi|lui|leur|leurs|eux|y|nous|vous|ils|ce|cette|??a|on|j'|t'|c'|m'|me)[\s?](a|ai|as|avons|avez|ont|eus|eut|e??mes|e??tes|eurent|eu|avais|avait|avions|aviez|avaient|aurai|auras|aura|aurons|aurez|auront|avoir)[$|\s]/ig;
    //var reg_pronom_faire = /(^|\s)(je|tu|elle|il|moi|toi|soi|lui|leur|leurs|eux|y|nous|vous|ils|ce|cette|??a|on|j'|t'|c'|m'|me)[\s?](faire|fais|fait|faisons|faites|font|fis|fit|faisais|faisait|faisions|faisiez|faisaient|ferai|feras|fera|ferons|ferez)[$|\s]/ig;

    var recognition = new webkitSpeechRecognition();
    recognition.continuous = true;
    recognition.lang = 'fr-FR';
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;

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
          if(verbe_array[id - 1][0] == '??tre'){
            dit_bonjour('verbe ??tre pr??c??dent le mot ' + word_search);
          }
        }

        while(i <= '10900' && verbejson[i] && word_found == null){
          if(verbejson[i]['indicatif']){
            n = 0;
            while(verbejson[i]['indicatif']['pr??sent'][n] && word_found == null){
              if(verbejson[i]['indicatif']['pr??sent'][n] == word_search){
                word_found = verbejson[i]['indicatif']['pr??sent'][n];
                word_id = i;
                famille = 'indicatif';
                temps = 'pr??sent';
                personne = n;
              }
              n++;
            }
            n = 0;
            while(verbejson[i]['indicatif']['pass?? compos??'][n] && word_found == null){
              if(verbejson[i]['indicatif']['pass?? compos??'][n] == word_search){
                word_found = verbejson[i]['indicatif']['pass?? compos??'][n];
                word_id = i;
                famille = 'indicatif';
                temps = 'pass?? compos??';
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
            while(verbejson[i]['indicatif']['pass?? simple'][n] && word_found == null){
              if(verbejson[i]['indicatif']['pass?? simple'][n] == word_search){
                word_found = verbejson[i]['indicatif']['pass?? simple'][n];
                word_id = i;
                famille = 'indicatif';
                temps = 'pass?? simple';
                personne = n;
              }
              n++;
            }
            n = 0;
            while(verbejson[i]['indicatif']['pass?? ant??rieur'][n] && word_found == null){
              if(verbejson[i]['indicatif']['pass?? ant??rieur'][n] == word_search){
                word_found = verbejson[i]['indicatif']['pass?? ant??rieur'][n];
                word_id = i;
                famille = 'indicatif';
                temps = 'pass?? ant??rieur';
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
            while(verbejson[i]['indicatif']['futur ant??rieur'][n] && word_found == null){
              if(verbejson[i]['indicatif']['futur ant??rieur'][n] == word_search){
                word_found = verbejson[i]['indicatif']['futur ant??rieur'][n];
                word_id = i;
                famille = 'indicatif';
                temps = 'futur ant??rieur';
                personne = n;
              }
              n++;
            }
          }
          if(verbejson[i]['subjonctif']){
            n = 0;
            while(verbejson[i]['subjonctif']['pr??sent'][n] && word_found == null){
              if(verbejson[i]['subjonctif']['pr??sent'][n] == word_search){
                word_found = verbejson[i]['subjonctif']['pr??sent'][n];
                word_id = i;
                famille = 'subjonctif';
                temps = 'pr??sent';
                personne = n;
              }
              n++;
            }
            n = 0;
            while(verbejson[i]['subjonctif']['pass??'][n] && word_found == null){
              if(verbejson[i]['subjonctif']['pass??'][n] == word_search){
                word_found = verbejson[i]['subjonctif']['pass??'][n];
                word_id = i;
                famille = 'subjonctif';
                temps = 'pass??';
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
            while(verbejson[i]['conditionnel']['pr??sent'][n] && word_found == null){
              if(verbejson[i]['conditionnel']['pr??sent'][n] == word_search){
                word_found = verbejson[i]['conditionnel']['pr??sent'][n];
                word_id = i;
                famille = 'conditionnel';
                temps = 'pr??sent';
                personne = n;
              }
              n++;
            }
            n = 0;
            while(verbejson[i]['conditionnel']['pass?? 1??re forme'][n] && word_found == null){
              if(verbejson[i]['conditionnel']['pass?? 1??re forme'][n] == word_search){
                word_found = verbejson[i]['conditionnel']['pass?? 1??re forme'][n];
                word_id = i;
                famille = 'conditionnel';
                temps = 'pass?? 1??re forme';
                personne = n;
              }
              n++;
            }
            n = 0;
            while(verbejson[i]['conditionnel']['pass?? 2??me forme'][n] && word_found == null){
              if(verbejson[i]['conditionnel']['pass?? 2??me forme'][n] == word_search){
                word_found = verbejson[i]['conditionnel']['pass?? 2??me forme'][n];
                word_id = i;
                famille = 'conditionnel';
                temps = 'pass?? 2??me forme';
                personne = n;
              }
              n++;
            }
          }
          if(verbejson[i]['imp??ratif']){
            n = 0;
            while(verbejson[i]['imp??ratif']['pr??sent'][n] && word_found == null){
              if(verbejson[i]['imp??ratif']['pr??sent'][n] == word_search){
                word_found = verbejson[i]['imp??ratif']['pr??sent'][n] ;
                word_id = i;
                famille = 'imp??ratif';
                temps = 'pr??sent';
                personne = n;
              }
              n++;
            }
            n = 0;
            while(verbejson[i]['imp??ratif']['pass??'][n] && word_found == null){
              if(verbejson[i]['imp??ratif']['pass??'][n] == word_search){
                word_found = verbejson[i]['imp??ratif']['pass??'][n];
                word_id = i;
                famille = 'imp??ratif';
                temps = 'pass??';
                personne = n;
              }
              n++;
            }
          }
          if(verbejson[i]['infinitif']){
            n = 0;
            while(verbejson[i]['infinitif']['pr??sent'][n] && word_found == null){
              if(verbejson[i]['infinitif']['pr??sent'][n] == word_search){
                word_found = verbejson[i]['infinitif']['pr??sent'][n];
                word_id = i;
                famille = 'infinitif';
                temps = 'pr??sent';
                personne = n;
              }
              n++;
            }
          }
          if(verbejson[i]['participe']){
            n = 0;
            while(verbejson[i]['participe']['pr??sent'][n] && word_found == null){
              if(verbejson[i]['participe']['pr??sent'][n] == word_search){
                word_found = verbejson[i]['participe']['pr??sent'][n];
                word_id = i;
                famille = 'participe';
                temps = 'pr??sent';
                personne = n;
              }
              n++;
            }
            n = 0;
            while(verbejson[i]['participe']['pass??'][n] && word_found == null){
            if(verbejson[i]['participe']['pass??'][n] == word_search){
              word_found = verbejson[i]['participe']['pass??'][n];
              word_id = i;
              famille = 'participe';
              temps = 'pass??';
              personne = n;
            }
            n++;
          }
          }
          if(word_found != null)
            word_verbe = verbejson[i]['infinitif']['pr??sent'][0];
          i++;
        }
        if(word_found != null){
          console.log(word_search + " est le verbe " + word_verbe + " est ?? la place " + word_id + "\nFamille : " + famille + "\nTemps : " + temps + "\nPersonne : " + (personne + 1));
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
    function line_constructor(phrase){
      if(phrase.match(reg_firstspace)){
        console.log('premier espace retir??');
        phrase = phrase.replace(reg_firstspace, '');
      }
      analyse_word_table = phrase.split(/\s|'/);
      analyse_type_table = new Array(analyse_word_table.lenght);

      var say_it = '';
      var i = 0;
      while(analyse_word_table[i]){
        if(analyse_word_table[i].match(reg_pronom)){
          say_it += 'pronom, '
          analyse_type_table[i] = 'pronom';
        }
        else if(analyse_word_table[i].match(reg_art_def) || analyse_word_table[i].match(reg_art_indef) || analyse_word_table[i].match(reg_art_partitif) || analyse_word_table[i].match(reg_appartenance)){
          say_it += 'article, '
          analyse_type_table[i] = 'article';
        }
        else if(search_verbe(analyse_word_table[i], i) != '1'){
          if(analyse_word_table[i - 1] && (analyse_word_table[i - 1].match(/??|au|aux|le|la/i) || (analyse_word_table[i - 1].match(/la|le/i) && analyse_word_table[i - 2].match(/??|a/i)))){
            say_it += 'mot, ';
            analyse_type_table[i] = 'mot';
          }
          else{
            say_it += 'verbe, ';
            analyse_type_table[i] = 'verbe';
          }
        }
        else if(search_verbe(analyse_word_table[i], i) != 2){
          say_it += 'mot, ';
          analyse_type_table[i] = 'mot';
        }
        else{
          say_it += 'autre, ';
          analyse_type_table[i] = 'autre';
        }
        i++;
      }
      dit_bonjour("Voici l'analyse de la phrase : " + phrase);
      console.log(say_it);
      /*
      phrase = phrase.replaceAll(/[^|\s]vas-tu[$|\s]/gi, "tu vas");
      phrase = phrase.replaceAll(/[^|\s]vais-je[$|\s]/gi, "je vais");
      phrase = phrase.replaceAll(/[^|\s]va-t'il[$|\s]/gi, "il va");
      phrase = phrase.replaceAll(/[^|\s]va-t'on[$|\s]/gi, "nous allons");
      phrase = phrase.replaceAll(/[^|\s]allez-vous[$|\s]/gi, "vous allez");
      phrase = phrase.replaceAll(/[^|\s]allons-nous[$|\s]/gi, "nous allons");
      phrase = phrase.replaceAll(/[^|\s]allaient-ils[$|\s]/gi, "ils allaient");
      phrase = phrase.replaceAll(/[^|\s]suis-je[$|\s]/gi, "je suis");
      phrase = phrase.replaceAll(/[^|\s]es-tu[$|\s]/gi, "tu es");
      phrase = phrase.replaceAll(/[^|\s]est-on[$|\s]/gi, "nous sommes");
      phrase = phrase.replaceAll(/[^|\s]est-t'il[$|\s]/gi, "il est");
      phrase = phrase.replaceAll(/[^|\s]sommes-nous[$|\s]/gi, "nous sommes");
      phrase = phrase.replaceAll(/[^|\s]??tes-vous[$|\s]/gi, "vous ??tes");

      analyse_word_table = phrase.split(' ');
      analyse_type_table = new Array(analyse_word_table.lenght);

      var say_it = '';
      var i = 0;
      while(analyse_word_table[i]){
        if(analyse_word_table[i].match(reg_art_def) || analyse_word_table[i].match(reg_art_indef) || analyse_word_table[i].match(reg_art_partitif) || analyse_word_table[i].match(reg_appartenance)){
          //d??tection d'ordre
          analyse_type_table[i] = 'article';
          if(analyse_word_table[i - 1] && analyse_word_table[i + 1] && order_act == 0){
            var first_group = analyse_word_table[i - 1] + 'r';
            var second_group = analyse_word_table[i - 1] + 'r';
            if(analyse_word_table[i - 2]){
              var first_group_bis = analyse_word_table[i - 2] + 'r';
              var second_group_bis = analyse_word_table[i - 2] + 'r';
            }
            if(first_group.match(reg_verbe_premier)){
              console.error('Verbe imp??ratif 1er groupe');
              realise_ordre(i - 1, phrase);
              say_it += analyse_word_table[i] + " ";
            }
            else if(analyse_word_table[i - 2]){
              if(first_group_bis.match(reg_verbe_premier)){
                console.error('Verbe imp??ratif 1er groupe');
                realise_ordre(i - 2, phrase);
              }
              say_it += analyse_word_table[i] + " ";
            }
            else if(second_group.match(reg_verbe_second)){
              console.error('Verbe imp??ratif 2??me groupe');
              realise_ordre(i - 1, phrase);
              say_it += analyse_word_table[i] + " ";
            }
            else if(analyse_word_table[i - 2]){
              if(second_group_bis.match(reg_verbe_second)){
                console.error('Verbe imp??ratif 2??me groupe');
                realise_ordre(i - 2, phrase);
              }
            }
            else if(analyse_word_table[i - 1].match(reg_verbe_troisieme_imp) || (analyse_word_table[i - 2] && analyse_word_table[i - 2].match(reg_verbe_troisieme_imp))){
              console.error('Verbe imp??ratif 3??me groupe');
              realise_ordre();
              say_it += analyse_word_table[i] + " ";
            }
            else
              say_it += analyse_word_table[i] + " ";
          }
          else
            say_it += analyse_word_table[i] + " ";
        }
        else{
          analyse_word_table[i] = analyse_word_table[i].replaceAll("m'", "#1");
          analyse_word_table[i] = analyse_word_table[i].replaceAll("t'", "#2");
          analyse_word_table[i] = analyse_word_table[i].replaceAll("toi-", "#3");
          analyse_word_table[i] = analyse_word_table[i].replaceAll("moi-", "#4");

          analyse_word_table[i] = analyse_word_table[i].replaceAll("#1", "t'");
          analyse_word_table[i] = analyse_word_table[i].replaceAll("#2", "m'");
          analyse_word_table[i] = analyse_word_table[i].replaceAll("#3", "moi-");
          analyse_word_table[i] = analyse_word_table[i].replaceAll("#4", "toi-");

          if(analyse_word_table[i].match(reg_pronom)){
            analyse_type_table[i] = 'pronom';
            if(response_table[analyse_word_table[i]]){
              if(response_table[analyse_word_table[i]] == 'je'){
                if(response_table[analyse_word_table[i + 1]] && response_table[analyse_word_table[i + 1]].match(/^[a|e|i|o|u|y].+$/i))
                  say_it += "j'";
                else if(analyse_word_table[i + 1] && analyse_word_table[i + 1].match(/^[a|e|i|o|u|y].+$/i))
                  say_it += "j'";
                else{
                  say_it += "je ";
                }
              }
              else
                say_it += response_table[analyse_word_table[i]] + " ";
            }
            else
              say_it += analyse_word_table[i] + " ";
          }
          else if(analyse_word_table[i].match(reg_etre)){
            analyse_type_table[i] = 'etre';
            if(response_table[analyse_word_table[i]])
              say_it += response_table[analyse_word_table[i]] + " ";
            else
              say_it += analyse_word_table[i] + " ";
          }
          else if(analyse_word_table[i].match(reg_avoir)){
            analyse_type_table[i] = 'avoir';
            if(response_table[analyse_word_table[i]]){
              say_it += response_table[analyse_word_table[i]] + " ";
            }
            else
              say_it += analyse_word_table[i] + " ";
          }
          else if(analyse_word_table[i].match(reg_faire)){
            analyse_type_table[i] = 'faire';
            if(response_table[analyse_word_table[i]])
              say_it += response_table[analyse_word_table[i]] + " ";
            else
              say_it += analyse_word_table[i] + " ";
          }
          else if(analyse_word_table[i].match(reg_aller)){
            analyse_type_table[i] = 'faire';
            if(response_table[analyse_word_table[i]])
              say_it += response_table[analyse_word_table[i]] + " ";
            else
              say_it += analyse_word_table[i] + " ";
          }
          else if(analyse_word_table[i].match(reg_pronom_verbe)){
            analyse_type_table[i] = 'pronom + verbe';
            if(response_table[analyse_word_table[i]])
              say_it += response_table[analyse_word_table[i]] + " ";
            else
              say_it += analyse_word_table[i] + " ";
          }
          else if(analyse_word_table[i].match(reg_verbe_premier)){
            analyse_type_table[i] = 'verbe_1 infinitif';
            say_it += analyse_word_table[i] + " ";
          }
          else if(analyse_word_table[i].match(reg_verbe_second)){
            analyse_type_table[i] = 'verbe_2 infinitif';
            say_it += analyse_word_table[i] + " ";
          }
          else if(analyse_word_table[i].match(reg_verbe_troisieme)){
            analyse_type_table[i] = 'verbe_3 infinitif';
            say_it += analyse_word_table[i] + " ";
          }
          else{
            analyse_type_table[i] = 'null';
            say_it += analyse_word_table[i] + " ";
          }
        }
        i++;
        //say_it = "Le mot num??ro 3 est " + analyse_word_table[2] + " .";
      }
      console.log("r??sultat = " + say_it);
      if(order_act == 0)
        dit_bonjour(say_it);
      console.log(analyse_word_table + "\n\n");
      console.log(analyse_type_table);
      order_act = 0;*/
    }
    function realise_ordre(id, phrase){
      order_act = 1;
      console.error("r??alisation d'ordre !");
      var order_regex = /^.+[?! le| la| l'| de| du| un| une] [ le| la| l'| de| du| un| une]* (.+)$/i;
      if(order_table[analyse_word_table[id]] == 1){
        //Cr??ation
        var order_txt = phrase.replace(order_regex, '$1');
        console.error(order_txt);
        dit_bonjour("Comme ??a ?");
      }
      else if(order_table[analyse_word_table[id]] == 2){
        //Modification
        var order_txt = phrase.replace(order_regex, '$1');
        console.error(order_txt);
        dit_bonjour("les r??sultat est " + order_txt);
      }
      else if(order_table[analyse_word_table[id]] == 3){
        //Agrandissement
        var order_txt = phrase.replace(order_regex, '$1');
        console.error(order_txt);
        dit_bonjour("Comme ??a ?");
      }
      else{
        dit_bonjour("Je n'ai pas compris votre demande");
      }
      code_cursor;
    }
    function ecoute_moi(){
      result_id = 0;
      recognition.onresult = function(event){
        console.log(event.results[result_id][0].transcript);
        line_constructor(event.results[result_id][0].transcript);
        /*var now = new Date();

        var annee   = now.getFullYear();
        var mois    = now.getMonth();
        var mois_table = new Array('Janvier', 'F??vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao??t', 'Septembre', 'Octobre', 'D??cembre');
        var jour    = now.getDate();
        var heure   = now.getHours();
        var minute  = now.getMinutes();
        var seconde = now.getSeconds();

        if(talk_switch == 1){
          console.log('coupage de parole');
          dit_bonjour('Merci de ne pas me couper la parole !');
        }
        else if(event.results[result_id][0].transcript.match(reg_name))
          dit_bonjour('Oui Monsieur !');
        else if(event.results[result_id][0].transcript.match(reg_bonjour))
          dit_bonjour('Enchant?? ! Que puis-je faire pour vous ?');
        else if(event.results[result_id][0].transcript.match(reg_cava))
          dit_bonjour('Je vais tr??s bien ! Et vous ?');
        else if(event.results[result_id][0].transcript.match(reg_bien))
          dit_bonjour('Je suis heureuse que vous soyez bien !');
        else if(event.results[result_id][0].transcript.match(reg_watisit))
          dit_bonjour('Je suis une modeste intelligence artificielle cr????e par Romain Giovanni le premier Mars 2021');
        else if(event.results[result_id][0].transcript.match(reg_capacity))
          dit_bonjour('Je n\'ai pas encore cette capacit?? mais j\'y travail');
        else if(event.results[result_id][0].transcript.match(reg_say_hello)){
          console.log('say_it detected');
          var say_it_new = event.results[result_id][0].transcript.replace(reg_say_hello, 'Bonjour $1');
          dit_bonjour(say_it_new);
        }
        else if(event.results[result_id][0].transcript.match(reg_hour)){
         console.log('hour detected');
         var say_hour = "Il est " + heure + " heure et " + minute + "minutes";
         dit_bonjour(say_hour);
        }
        else if(event.results[result_id][0].transcript.match(reg_date)){
          console.log('date detected');
          var say_date = "Nous sommes le " + jour + " " + mois_table[mois] + " " + annee;
          dit_bonjour(say_date);
        }*/
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
    </script>
  -->
  </head>
  <body>
    <div class='txt_screen'></div>
    <div class='rec_console' id='console'></div>

    <div class='talk_circle'></div>
    <div class='talk_circle_bis'></div>
    <div class='talk_circle_ter' onclick="ecoute_moi()"></div>

    <div class='question_zone'>
      <input class='question_input' type='text' placeholder='notez votre phrase'></input>
      <div class='question_button' onclick="word_detect(document.querySelector('.question_input').value)">Valider</div>
    </div>
  </body>
</html>
