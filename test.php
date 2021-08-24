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
    var reg_verbe_premier = /Aérer|Abaisser|abandonner|Abcéder|Abdiquer|Abécher|Abecquer|Abéquer|Aberrer|Abhorrer|Abîmer|Abjurer|Ablater|Abloquer|Aboyer|Abomber|Abominer|Abonder|Abonner|Aborder|Aborner|Aboucher|Abouler|Abouter|Abréger|Abraser|Abreuver|Abricoter|Abriter|Abroger|Absenter|Absorber|Absterger|Abuser|Acérer|Acagnarder|Accéder|Accabler|Accagnarder|Accaparer|Accastiller|Accélérer|Accentuer|Accepter|Accessoinser|Accidenter|Acclamer|Acclimater|Accoler|Accommoder|Accompagner|Accorer|Accorder|Accoster|Accoter|Accouer|Accoucher|Accoupler|Accoutrer|Accoutumer|Accréditer|Accrocher|Acculer|Acculturer|Accumuler|Accuser|Acenser|Acétifier|Acétyler|Acheter|Achever|Achaler|Achalander|Acharner|Acheminer|Achopper|Achromatiser|Aciérer|Acidifier|Aciduler|Aciseler|Acoquiner|Acquiescer|Acquitter|Acter|Actionner|Activer|Actualiser|Adapter|Additionner|Adhérer|Adirer|Adjectiver|Adjectiviser|Adjuger|Adjurer|Administrer|Admirer|Admonester|Adoniser|Adonner|Adopter|Adorer|Adosser|Adouber|Adresser|Adsorber|Aduler|Adultérer|Adverbialiser|Afférer|Affabuler|Affaisser|Affaiter|Affaler|Affamer|Afféager|Affecter|Affectionner|Affermer|Afficher|Affiler|Affilier|Affiner|Affleurer|Affirmer|Affliger|Afflouer|Affluer|Affoler|Affouager|Affouiller|Affourager|Affourcher|Affourrager|Affréter|Affriander|Affricher|Affrioler|Affriter|Affronter|Affruiter|Affubler|Affurer|Affûter|Africaniser|Agacer|Agencer|Agglomérer|Agglutiner|Aggraver|Agioter|Agiter|Agneler|Agoniser|Agréer|Agréger|Agrafer|Agrémenter|Agresser|Agricher|Agripper|Aguicher|Ahaner|Aicher|Aider|Aiguayer|Aiguiller|Aiguilleter|Aiguillonner|Aiguiser|Ailler|Aimer|Aimanter|Airer|Ajointer|Ajourer|Ajourner|Ajouter|Ajuster|Aléser|Alambiquer|Alarguer|Alarmer|Alcaliniser|Alcaliser|Alcooliser|Alerter|Aleviner|Aliéner|Aligner|Alimenter|Aliter|Allécher|Alléger|Alléguer|Allier|Allaiter|Allégoriser|Allonger|Allouer|Allumer|Alluvionner|Alpaguer|Alphabétiser|Altérer|Alterner|Aluminer|Aluner|Amener|Amadouer|Amalgamer|Amariner|Amarrer|Amasser|Amateloter|Amatelotter|Ambiancer|Ambitionner|Ambler|Ambrer|Améliorer|Aménager|Amender|Amenuiser|Américaniser|Ameuter|Amidonner|Aminer|Amnistier|Amocher|Amodier|Amonceler|Amorcer|Amordancer|Amourer|Amouracher|Amplifier|Amputer|Amurer|Amuser|Analgésier|Analyser|Anastomoser|Anathématiser|Anatomiser|Ancrer|Anémier|Anesthésier|Angler|Anglaiser|Angliciser|Angoisser|Anhéler|Animer|Animaliser|Aniser|Ankyloser|Anneler|Annexer|Annihiler|Annoncer|Annoter|Annualiser|Annuler|Anodiser|Ânonner|Antéposer|Anticiper|Antidater|Aoûter|Apaiser|Apanager|Apatamer|Apetisser|Apeurer|Apiquer|Apitoyer|Aplomber|Aposter|Apostasier|Apostiller|Apostropher|Appeler|Appéter|Appairer|Apparier|Appareiller|Apparenter|Appâter|Appertiser|Appliquer|Appointer|Apponter|Apporter|Apposer|Apprécier|Appréhender|Apprêter|Apprivoiser|Approcher|Approprier|Approuver|Approvisionner|Appuyer|Apurer|Aquiger|Arabiser|Araser|Arbitrer|Arborer|Arboriser|Arc-bouter|Archaïser|Architecturer|Archiver|Arçonner|Arder|Ardoiser|Argenter|Argoter|Argotiser|Argougner|Arguer|Argumenter|Ariser|Armer|Armorier|Arnaquer|Aromatiser|Arpéger|Arpenter|Arpigner|Arquer|Arquebuser|Arquepincer|Arracher|Arraisonner|Arranger|Arrenter|Arrérager|Arrêter|Arriérer|Arrimer|Arriser|Arriver|Arroser|Articuler|Artiller|Ascensionner|Aseptiser|Aspecter|Asperger|Asphalter|Asphyxier|Aspirer|Assécher|Assener|Asséner|Assaisonner|Assarmenter|Assassiner|Assembler|Assermenter|Assiéger|Assibiler|Assigner|Assimiler|Assister|Associer|Assoiffer|Assoler|Assommer|Assoner|Assoter|Assumer|Assurer|Asticoter|Astiquer|Atermoyer|Atomiser|Atourner|Atrophier|Atteler|Attabler|Attacher|Attaquer|Attenter|Atténuer|Atterrer|Attester|Attiger|Attifer|Attirer|Attiser|Attitrer|Attraper|Attribuer|Attriquer|Attrister|Attrouper|Aubiner|Auditionner|Augmenter|Augurer|Auner|Auréoler|Aurifier|Ausculter|Authentifier|Authentiquer|Auto-envoyer|Autoenvoyer|Autofinancer|Autographier|Automatiser|Autopsier|Autoriser|Avérer|Avoyer|Avaler|Avaliser|Avancer|Avantager|Avarier|Aventurer|Aveugler|Aviner|Aviser|Avitailler|Aviver|Avocasser|Avoiner|Avoisiner|Avorter|Avouer|Avuer|Axer|Axiomatiser|Azimuter|Azimuther|Azurer|Bayer|Béer|Béguer|Béquer|Babeler|Babiller|Bâcher|Bachoter|Bâcler|Bader|Badauder|Badigeonner|Badiner|Baffer|Bafouer|Bafouiller|Bâfrer|Bagarrer|Bagoter|Bagotter|Bagouler|Baguer|Baguenauder|Baigner|Bailler|Bâiller|Bâillonner|Baiser|Baisoter|Baisser|Balayer|Balader|Balafrer|Balancer|Balanstiquer|Balbutier|Baleiner|Baligander|Baliser|Baliverner|Balkaniser|Baller|Ballaster|Ballonner|Ballotter|Balluchonner|Balter|Baluchonner|Balustrer|Bambocher|Banaliser|Bananer|Bancher|Bander|Banner|Banquer|Banqueter|Baptiser|Baquer|Baqueter|Baréter|Baragouiner|Baraquer|Baratiner|Baratter|Barber|Barbeyer|Barbifier|Barboter|Barbouiller|Barder|Barder|Barguigner|Barioler|Barjaquer|Barloquer|Baronner|Barouder|Barrer|Barricader|Baser|Basaner|Basculer|Bassiner|Baster|Bastillonner|Bastionner|Bastonner|Bateler|Bâter|Batailler|Batifoler|Bâtonner|Baver|Bavarder|Bavasser|Bazarder|Bavocher|Béatifier|Bêcher|Bêcheveter|Bécoter|Becquer|Becqueter|Becter|Bedonner|Bégayer|Bégaler|Bégueter|Bêler|Beloter|Bémoliser|Bénéficier|Benner|Béqueter|Béquiller|Bercer|Berdeller|Berlurer|Berner|Besogner|Bêtifier|Bêtiser|Bétonner|Beugler|Beurrer|Biaiser|Bibarder|Bibeloter|Biberonner|Bicher|Bichonner|Bichoter|Se bider|Bidonner|Bidouiller|Biffer|Biffetonner|Bifurquer|Bigarrer|Bigler|Biglouser|Bigophoner|Bigorner|Bigrer|Bilaner|Biller|Billebauder|Billonner|Biloquer|Biner|Biologiser|Biquer|Biser|Biscuiter|Biseauter|Bisegmenter|Bisquer|Bisser|Bistourner|Bistrer|Biter|Bitonner|Bitter|Bitumer|Bituminer|Bivouaquer|Bizuter|Bléser|Blablater|Blackbouler|Blaguer|Blairer|Blâmer|Blaser|Blasonner|Blasphémer|Blatérer|Bleffer|Blesser|Bleuter|Blinder|Blinquer|Blobloter|Blondoyer|Bloquer|Blouser|Bluffer|Bluter|Blutiner|Bobiner|Bocarder|Boetter|Boiser|Boiter|Boitiller|Bolcheviser|Bomber|Bombarder|Bonder|Bondériser|Bondonner|Bonifier|Bonimenter|Boquillonner|Border|Bordéliser|Bordurer|Borgnoter|Borner|Bornoyer|Bosseler|Bosser|Bossuer|Bostonner|Botteler|Botaniser|Botter|Bottiner|Bouger|Boubouler|Boucaner|Boucher|Boucharder|Bouchonner|Boucler|Bouder|Boudiner|Bouffer|Bouffonner|Bougonner|Bouillonner|Bouillotter|Bouler|Boulanger|Bouleverser|Bouliner|Boulocher|Boulonner|Boulotter|Boumer|Bouquiner|Bourder|Bourdonner|Bourgeonner|Bourlinguer|Bourreler|Bourrer|Boursicoter|Boursouffler|Boursoufler|Bousculer|Bousiller|Boustifailler|Bouter|Bouteiller|Boutonner|Bouturer|Boxer|Boxonner|Boycotter|Brayer|Braconner|Brader|Brailler|Braiser|Bramer|Brancarder|Brancher|Brandonner|Brandiller|Branler|Branlocher|Braquer|Braser|Brasiller|Brasquer|Brasser|Brasseyer|Braver|Bredouiller|Brêler|Brelander|Breller|Brésiller|Brétailler|Brétauder|Bretauder|Bretteler|Bretter|Breveter|Bricoler|Brider|Bridger|Briefer|Briffer|Brigander|Briguer|Briller|Brillanter|Brillantiner|Brimer|Brimbaler|Bringuebaler|Brinqueballer|Briocher|Briquer|Briqueter|Briser|Broyer|Broadcaster|Brocanter|Brocarder|Brocher|Broder|Broncher|Bronzer|Broquer|Broquanter|Brosser|Brouetter|Brouiller|Brouillasser|Brouillonner|Brouter|Bruiner|Bruisser|Bruiter|Brûler|Brumer|Brumasser|Brusquer|Brutaliser|Bûcher|Budgéter|Budgétiser|Buller|Bureaucratiser|Buriner|Buser|Busquer|Buter|Butiner|Butter|Buvoter|Céder|Celer|Cabaler|Cabaner|Cabiner|Câbler|Cabosser|Caboter|Cabotiner|Cabrer|Cabrioler|Cacaber|Cacarder|Cacher|Cacheter|Cachetonner|Cachotter|Cadancher|Cadastrer|Cadeauter|Cadencer|Cadenasser|Cadoter|Cadrer|Cafarder|Cafeter|Cafouiller|Cafter|Cagner|Cagnarder|Caguer|Cahoter|Cailler|Cailleter|Caillebotter|Caillouter|Caïmanter|Cajoler|Caler|Caleter|Calamistrer|Calancher|Calandrer|Calciner|Calculer|Calfater|Calfeutrer|Calibrer|Câliner|Calligraphier|Calmer|Calomnier|Calorifuger|Calotter|Calquer|Calter|Cambrer|Cambrioler|Cambuter|Cameloter|Camembérer|Camionner|Camoufler|Camper|Camphrer|Caner|Canaliser|Canarder|Cancaner|Cancériser|Canneler|Canner|Cannibaliser|Canoniser|Canonner|Canoter|Cantiner|Cantonner|Canuler|Caoutchouter|Capéer|Capeler|Capeyer|Capahuter|Caparaçonner|Capitaliser|Capitonner|Capituler|Caponner|Caporaliser|Capoter|Capsuler|Capter|Captiver|Capturer|Capuchonner|Caquer|Caqueter|Caréner|Carer|Carier|Carabiner|Caracoler|Caractériser|Caramboler|Caraméliser|caraméliser|carapater|Carbonater|Carboniser|Carburer|Carcailler|Carder|Carencer|Caresser|Carguer|Caricaturer|Carillonner|Carmer|Carminer|carnifier|Carotter|Caroubler|Carreler|Carrer|Carroyer|Carrosser|Carter|Cartonner|Cartoucher|Caser|Cascader|Caséifier|Casemater|Caserner|Casquer|Casser|Casse-croûter|Castagner|Castrer|Cataloguer|Catalyser|Catapulter|Catastropher|Catcher|Catéchiser|Catiner|Cauchemarder|Causer|Cautériser|Cautionner|Caver|Cavacher|Cavaler|Cavalcader|Caviarder|Cégotter|Ceinturer|Célébrer|Cémenter|Cendrer|Censurer|Center|Centrer|Centraliser|Centrifuger|Centupler|Cercler|Cerner|Certifier|Césariser|Cesser|Chérer|Chier|Chabler|Chagriner|Chahuter|Chaîner|Challenger|Chalouper|chamailler|Chamarrer|Chambarder|Chambouler|Chambrer|Chameauser|Chamoiser|Champagniser|Champlever|Changer|Chanceler|Chancetiquer|Chansonner|Chanfreiner|Chanstiquer|Chanter|Chantonner|Chantourner|Chapeler|Chaparder|Chapeauter|Chaperonner|Chapitrer|Chaponner|Chaptaliser|Charger|Se charger|Charbonner|Charcuter|Se charcuter|Charlater|Chariboter|Charmer|Charpenter|Charrier|Charroyer|Chartériser|Chasser|Châtier|Châtaigner|Chatoyer|Chatonner|Chatouiller|Châtrer|Chauffer|Chauler|Chaumer|Chausser|Chavirer|Chawer|Chelinguer|Cheminer|Chemiser|Chènevotter|Chercher|Cherrer|Chevaler|Chevaucher|Cheviller|Chevreter|Chevronner|Chevroter|Chiader|Chialer|Chicaner|chicorer|chicorner|Chicoter|Chicotter|Chienner|Chiffonner|Chiffrer|Chigner|Chimer|Chiner|Chinoiser|Chiper|Chipoter|Chiquer|Chirographier|Chlinguer|Chlorer|Chloroformer|Chlorurer|Choyer|Chocotter|Chofer|Chômer|Choper|Chopiner|Chopper|Choquer|Chorégraphier|Choser|Chosifier|Chouanner|Chouchouter|Choufer|Chourer|Chouraver|Chouriner|Christianiser|Chromer|Chromatiser|Chroniquer|Chronométrer|Chroumer|Chuchoter|Chuinter|Chuter|Cibler|Cicatriser|Cigler|Ciller|Cimenter|Cinématographier|Cingler|Cintrer|Cirer|Circonstancier|Circuler|Ciseler|Cisailler|Citer|Civiliser|Cléber|Clabauder|Claboter|Clacher|Claironner|Clamer|Clamecer|Clamper|Clamser|Claper|Clapoter|Clapper|Clapser|Claquer|Claqueter|Claquemurer|Clarifier|Classer|Classifier|Claudiquer|Claustrer|Claver|Claveter|Clavetter|Clayonner|Clicher|Clienter|Cligner|Clignoter|Climatiser|Cliquer|Cliqueter|Cliquoter|Clisser|Cliver|Clocher|Clochardiser|Cloisonner|Cloîtrer|Cloner|Cloper|Clopiner|Cloquer|Clôturer|Clouer|Clouter|Cnser|Coaguler|Coaliser|Coasser|Cocher|Côcher|Cochonner|Cocoter|Cocotter|Cocufier|Coder|Codifier|Coéditer|Coexister|Coffrer|Cogérer|Cogiter|Cogner|Cognoter|Cohabiter|Cohériter|Coiffer|Coincer|Coïncider|Coïter|Cokéfier|Cokser|Coller|Colleter|Collaborer|Collapser|Collationner|Collecter|Collectionner|Collectiviser|Colliger|Colloquer|Colluder|Colmater|Coloniser|Colorer|Colorier|Coloriser|Colporter|Coltiner|Combiner|Combler|Combuger|Commérer|Commander|Commanditer|Commémorer|Commencer|Commenter|Commercer|Commercialiser|Commissionner|Commotionner|Commuer|Communier|Communaliser|Communiquer|Commuter|Compéter|Compacter|Comparer|Compartimenter|Compasser|Compenser|Compiler|Compisser|Compléter|Complexer|Complexifier|Complimenter|Compliquer|Comploter|Comporter|Composer|Composter|Compresser|Comprimer|Compter|Comptabiliser|Compulser|Computer|Concéder|Concasser|Concélébrer|Concentrer|Conceptualiser|Concerner|Concerter|Concilier|Concocter|Concorder|Concréter|Concrétiser|Concurrencer|Condamner|Condenser|Conditionner|Conférer|Confier|Confabuler|Confectionner|Confédérer|Confesser|Confiancer|Configurer|Confiner|Confirmer|Confisquer|Confiturer|Confluer|Conformer|Conforter|Confronter|Congeler|Congédier|Congestionner|Conglomérer|Conglutiner|Congréer|Congratuler|Conjecturer|Conjuguer|Conjurer|Connecter|Connobler|Connoter|Conobler|Conobrer|Consacrer|Conscientiser|Conseiller|Conserver|Considérer|Consigner|Consister|Consoler|Consolider|Consommer|Consoner|Conspirer|Conspuer|Constater|Consteller|Consterner|Constiper|Constituer|Constitutionnaliser|Consulter|Consumer|Conter|Contacter|Contagionner|Containeriser|Contaminer|Contempler|Conteneuriser|Contenter|Contester|Contingenter|Continuer|Contorsionner|Contourner|Contrer|Contracter|Contractualiser|Contracturer|Contrarier|Contraster|Contre-attaquer|Contre-hacher|Contre-indiquer|Contre-manifester|Contre-miner|Contre-murer|Contre-passer|Contre-plaquer|Contre-pointer|Contre-sceller|Contre-tirer|Contrebalancer|Contrebouter|Contrebraquer|Contrebuter|Contrecarrer|Contrehacher|Contremander|Contremarquer|Contrepointer|Contresigner|Contribuer|Contrister|Contrôler|Controuver|Controverser|Contusionner|Convier|Conventionner|Converger|Converser|Convivialiser|Convoyer|Convoiter|Convoler|Convoquer|Convulser|Convulsionner|Coopérer|Coopter|Coordonner|Copier|Copermuter|Copiner|Coposséder|Copter|Copuler|Coquer|Coqueter|Coquiller|Coraniser|Cordeler|Corder|Cordonner|Corner|Cornancher|Cornaquer|Corréler|Correctionaliser|Correctionnaliser|Corriger|Corroyer|Corroborer|Corroder|Corser|Corseter|Cosigner|Cosmétiquer|Cosser|Costumer|Coter|Cotiser|Côtoyer|Cotonner|Coucher|Couchailler|Couder|Coudoyer|Couiller|Couillonner|Couiner|Couler|Coulisser|Couper|Coupailler|Coupeller|Coupler|Courailler|Courber|Courbaturer|Couronner|Courroucer|Courser|Court-circuiter|Courtauder|Courtiser|Cousiner|Coûter|Couteauner|Coutoyer|Coutoner|Couturer|Couver|Coxer|Crécher|Créer|Crémer|Créner|Crever|Crier|Cracher|Crachiner|Crachoter|Crachouiller|Crailler|Cramer|Cramponner|Crampser|Cramser|Craner|Crâner|Cranter|Crapahuter|Crapaüter|Crapoter|Crapuler|Craqueler|Craquer|Craqueter|Crasser|Cravacher|Cravater|Crawler|Crayonner|Crédibiliser|Créditer|Créneler|Créoliser|Créosoter|Crêper|Crépiter|Crétiniser|Creuser|Crevasser|Criailler|Cribler|Criminaliser|Criquer|Crisper|Crisser|Cristalliser|Criticailler|Critiquer|Croasser|Crocher|Crocheter|Croiser|Croller|Croquer|Crosser|Crotter|Crouler|Croupionner|Croustiller|Croûter|Crucifier|Crypter|Cryptographier|Cuber|Cuirasser|Cuisiner|Cuivrer|Culer|Culbuter|Culminer|Culotter|Culpabiliser|Cultiver|Cumuler|Curer|Cureter|Cuveler|Cuver|Cyanoser|Cylindrer|Décher|Dactylographier|Daguer|Daigner|Daller|Damer|Damasquiner|Damasser|Damner|Dandiner|Danser|Dansotter|Darder|Dater|Dauber|Déactiver|Dealer|Déambuler|Débâcher|Débâcler|Débagouler|Débâillonner|Déballer|Débalourder|Débanaliser|Débander|Débanquer|Débaptiser|Débarboter|Débarbouiller|Débarder|Débarquer|Débarrer|Débarrasser|Débâter|Débaucher|Débecqueter|Débecter|Débequeter|Débiliter|Débillarder|Débiner|Débiter|Déblayer|Déblatérer|Débloquer|Débobiner|Déboguer|Déboiser|Déboîter|Débonder|Déborder|Débosseler|Débotter|Déboucher|Déboucler|Débouder|Débouler|Déboulonner|Débouquer|Débourber|Débourrer|Débourser|Déboussoler|Débouter|Déboutonner|Débrayer|Débraguetter|Débrancher|Débrider|Débriefer|Débrocher|Débrôler|Débrouiller|Débrousser|Débroussailler|Débucher|Débudgétiser|Débugger|Débuller|Débureaucratiser|Débusquer|Débuter|Décéder|Déceler|Décacheter|Décadenasser|Décadrer|Décaféiner|Décaisser|Décaler|Décalaminer|Décalcariser|Décalcifier|Décalotter|Décalquer|Décamper|Décaniller|Décanter|Décapeler|Décaper|Décapiter|Décapitaliser|Décapoter|Décapsuler|Décapuchonner|Décarburer|Décarcasser|Décarpiller|Décarreler|Décarrer|Décartonner|Décauser|Décaver|Décavaillonner|Décélérer|Décentrer|Décentraliser|Décercler|Décérébrer|Décerner|Décerveler|Décesser|Déchagriner|Déchaîner|Déchanter|Déchaper|Déchaperonner|Décharger|Décharner|Déchasser|Déchâsser|Déchaumer|Déchausser|Déchevêtrer|Décheviller|Déchiffonner|Déchiffrer|Déchiqueter|Déchirer|Déchlorurer|Déchouer|Déchristianiser|Déchromer|Décider|Décimer|Décimaliser|Décintrer|Déclamer|Déclarer|Déclasser|Déclaveter|Déclencher|Décléricaliser|Décliner|Décliqueter|Décloisonner|Déclouer|Décocher|Décoder|Décoffrer|Décoiffer|Décoincer|Décolérer|Décoller|Décolleter|Décoloniser|Décolorer|Décommander|Décommuniser|Décompenser|Décompléter|Décomplexer|Décomposer|Décompresser|Décomprimer|Décompter|Déconcentrer|Déconcerter|Déconditionner|Décongeler|Décongestionner|Déconner|Déconnecter|Déconseiller|Déconsidérer|Déconsigner|Déconstiper|Décontaminer|Décontenancer|Décontracter|Décorcer|Décorer|Décorder|Décorner|Décortiquer|Découcher|Découler|Découper|Découpler|Décourager|Découronner|Décréter|Décrier|Décrambuter|Décramponner|Décrapouiller|Décrasser|Décrédibiliser|Décréditer|Décrêper|Décrépiter|Décreuser|Décriminaliser|Décrisper|Décrocher|Décroiser|Décrotter|Décroûter|Décruer|Décruser|Décrypter|Décuivrer|Déculasser|Déculotter|Déculpabiliser|Décupler|Décuver|Dédier|Dédaigner|Dédamer|Dédicacer|Dédommager|Dédorer|Dédouaner|Dédoubler|Dédramatiser|Déféquer|Déférer|Défier|Défalquer|Défarder|Défarguer|Défatiguer|Défaucher|Défaufiler|Défausser|Défavoriser|Défenestrer|Déferler|Déferrer|Déferriser|Défeuiller|Défeutrer|Défiger|Défibrer|Déficeler|Déficher|Défigurer|Défiler|Défiscaliser|Déflagrer|Déflaquer|Déflegmer|Défloquer|Déflorer|Défolier|Défoncer|Déforcer|Déformer|Défouler|Défourailler|Défourner|Défourrer|Défrayer|Défranciser|Défretter|Défricher|Défringuer|Défriper|Défriser|Défroisser|Défroncer|Défroquer|Défruiter|Défrusquer|Dégeler|Dégager|Dégainer|Dégalonner|Déganter|Dégasoliner|Dégazer|Dégazoliner|Dégazonner|Dégénérer|Dégermer|Dégingander|Dégîter|Dégivrer|Déglacer|Déglinguer|Dégluer|Dégobiller|Dégoiser|Dégommer|Dégonder|Dégonfler|Dégorger|Dégoter|Dégotter|Dégoudronner|Dégouliner|Dégoupiller|Dégourer|Dégourrer|Dégoûter|Dégoutter|Dégréer|Dégréner|Dégrever|Dégrader|Dégrafer|Dégraisser|Dégravoyer|Dégringoler|Dégripper|Dégriser|Dégrosser|Dégueuler|Dégueulasser|Déguignonner|Déguiser|Dégurgiter|Déguster|Déhaler|Déhancher|Déharder|Déharnacher|Déhotter|Déhouiller|Déifier|Déjeter|Déjanter|Déjauger|Déjeuner|Déjouer|Déjucher|Délayer|Déléguer|Délier|Délacer|Délabialiser|Délabrer|Délabyrinther|Délainer|Délaisser|Délaiter|Délarder|Délasser|Délatter|Délaver|Déléaturer|Délecter|Délégitimer|Délester|Délibérer|Délignifier|Délimiter|Délinéer|Délirer|Délisser|Déliter|Délivrer|Déloger|Délocaliser|Déloquer|Délover|Délurer|Délustrer|Déluter|Démaçonner|Démagnétiser|Démailler|Démailloter|Démanger|Démancher|Demander|Démanteler|Démantibuler|Démaquiller|Démarier|Démarabouter|Démarcher|Démarquer|Démarrer|Démascler|Démasquer|Démastiquer|Démâter|Dématérialiser|Démazouter|Démédicaliser|Démêler|Démembrer|Déménager|Démerger|Démériter|Déméthaniser|Démeubler|Demeurer|Démieller|Démilitariser|Déminer|Déminéraliser|Démissionner|Démobiliser|Démocratiser|Démoder|Démoduler|Démonétiser|Démonter|Démontrer|Démoraliser|Démotiver|Démoucheter|Démouler|Démoustiquer|Démultiplier|Démurer|Démurger|Démuseler|Démystifier|Démythifier|Dénier|Dénasaliser|Dénationaliser|Dénatter|Dénaturer|Dénaturaliser|Dénazifier|Dénébuler|Dénébuliser|Déneiger|Dénerver|Déniaiser|Dénicher|Dénickeler|Dénicotiniser|Dénigrer|Dénitrer|Dénitrifier|Déniveler|Dénoyer|Dénombrer|Dénommer|Dénoncer|Dénoter|Dénouer|Dénoyauter|Densifier|Denteler|Dénuer|Dénucléariser|Dénuder|Dépailler|Dépaisseler|Dépalisser|Dépanner|Dépaqueter|Déparer|Déparier|Déparaffiner|Déparasiter|Dépareiller|Déparler|Départager|Départementaliser|Dépasser|Dépassionner|Dépatrier|Dépaver|Dépayser|Dépecer|Dépêcher|Dépeigner|Dépelotonner|Dépénaliser|Dépenser|Dépersonnaliser|Dépêtrer|Dépeupler|Déphaser|Déphosphorer|Dépiauter|Dépigmenter|Dépiler|Dépingler|Dépiquer|Dépister|Dépiter|Déplier|Déplacer|Déplafonner|Déplaner|Déplanquer|Déplanter|Déplâtrer|Déplisser|Déployer|Déplomber|Déplorer|Déplumer|Dépocher|Dépoétiser|Dépointer|Dépolariser|Dépolitiser|Dépolluer|Dépolymériser|Dépontiller|Dépopulariser|Déporter|Déposer|Déposséder|Dépoter|Dépoudrer|Dépouiller|Dépoussiérer|Dépraver|Déprécier|Dépressuriser|Déprimer|Dépriser|Déprogrammer|Déprolétariser|Dépropaniser|Déprotéger|Dépuceler|Dépulper|Dépurer|Députer|Déqualifier|Déquiller|Dérayer|Dérégler|Dérager|Déraciner|Dérader|Dérailler|Déraisonner|Déramer|Déranger|Déraper|Déraser|Dérater|Dératiser|Déréaliser|Dérelier|Déresponsabiliser|Dérésumenter|Dérider|Dériver|Déroger|Dérober|Dérocher|Déroder|Dérouiller|Dérouler|Dérouter|Désaérer|Désabonner|Désabuser|Désaccentuer|Désacclimater|Désaccorder|Désaccoupler|Désaccoutumer|Désacidifier|Désaciérer|Désacraliser|Désactiver|Désadapter|Désaffecter|Désaffilier|Désaffourcher|Désaffubler|Désagencer|Désagréger|Désagrafer|Désaimer|Désaimanter|Désaisonnatiser|Désajuster|Désaliéner|Désaligner|Désalper|Désaltérer|Désamarrer|Désambiguïser|Désamianter|Désamidonner|Désaminer|Désamorcer|Désannexer|Désaper|Désapparier|Désappointer|Désapprouver|Désapprovisionner|Désarçonner|Désargenter|Désarmer|Désarrimer|Désarticuler|Désassembler|Désassimiler|Désatomiser|Désavantager|Désaveugler|Désavouer|Désaxer|Desceller|Déséchouer|Désectoriser|Désembarquer|Désembobiner|Désembourber|Désembourgeoiser|Désembouteiller|Désembrayer|Désembuer|Désemmancher|Désempeser|Désemparer|Désemprisonner|Désencadrer|Désencarter|Désenchaîner|Désenchanter|Désenclaver|Désencombrer|Désencrasser|Désénerver|Désenfiler|Désenfler|Désenflammer|Désenfumer|Désengager|Désengluer|Désengorger|Désengrener|Désenivrer|Désenlacer|Désennuyer|Désenrayer|Désenrhumer|Désenrouer|Désensabler|Désensibiliser|Désensorceler|Désentoiler|Désentortiller|Désentraver|Désenvaser|Désenvelopper|Désenvenimer|Désenverguer|Désenvoûter|Déséquilibrer|Déséquiper|Déserter|Désespérer|Désétamer|Désétatiser|Désexciter|Désexualiser|Déshabiller|Déshabituer|Désherber|Déshériter|Désheurer|Déshonorer|Déshuiler|Déshumaniser|Déshumidifier|Déshydrater|Déshydrogéner|Déshypothéquer|Désigner|Désillusionner|Désincarner|Désincorporer|Désincruster|Désinculper|Désindexer|Désindustrialiser|Désinfatuer|Désinfecter|Désinformer|Désinhiber|Désinsectiser|Désintégrer|Désintéresser|Désintoxiquer|Désinviter|Désirer|Désobliger|Désobstruer|Désoccuper|Désocialiser|Désodoriser|Désoler|Désolidariser|Désoperculer|Désopiler|Désorber|Désorbiter|Désordonner|Désorganiser|Désorienter|Désosser|Désouffler|Désoxyder|Désoxygéner|Desquamer|Dessécher|Dessabler|Dessaler|Dessangler|Dessaouler|Dessaper|Desseller|Desserrer|Dessiller|Dessiner|Dessoler|Dessouder|Dessouffler|Dessoûler|Dessuinter|Déstabiliser|Destiner|Destituer|Destocker|Déstructurer|Désulfiter|Désulfurer|Désynchroniser|Dételer|Détacher|Détailler|Détaler|Détaller|Détapisser|Détartrer|Détaxer|Détecter|Déterger|Détériorer|Déterminer|Déterrer|Détester|Détirer|Détisser|Détoner|Détonneler|Détonner|Détortiller|Détourer|Détourner|Détoxiquer|Détracter|Détrancher|Détransposer|Détraquer|Détremper|Détresser|Détricoter|Détromper|Détrôner|Détroncher|Détroquer|Détrousser|Dévier|Dévaler|Dévaliser|Dévaloriser|Dévaluer|Devancer|Dévaser|Dévaster|Développer|Déventer|Déverguer|Déverrouiller|Déverser|Dévider|Deviner|Dévirer|Dévirginiser|Déviriliser|Déviroler|Deviser|Dévisager|Dévisser|Dévitaliser|Dévitrifier|Dévoyer|Dévoiler|Dévolter|Dévorer|Dévouer|Dézinguer|Diaboliser|Diagnostiquer|Dialectaliser|Dialectiser|Dialoguer|Dialyser|Diamanter|Diaphragmer|Diaprer|Dicter|Diéser|Diéséliser|Différer|Diffamer|Différencier|Difformer|Diffracter|Diffuser|Digérer|Digitaliser|Digresser|Dilacérer|Dilapider|Dilater|Diligenter|Diluer|Dimensionner|Diminuer|Dîner|Dindonner|Dinguer|Diphtonguer|Diplômer|Diriger|Discerner|Discipliner|Discompter|Discontinuer|Discorder|Discounter|Discréditer|Discriminer|Disculper|Discuputer|Discursiviser|Discuter|Discutailler|Disgracier|Disjoncter|Disloquer|Dispatcher|Dispenser|Disperser|Disposer|Disproportionner|Disputer|Disputailler|Disqualifier|Disséquer|Disséminer|Disserter|Dissimuler|Dissiper|Dissocier|Dissoner|Dissuader|Distancer|Distancier|Distiller|Distinguer|Distribuer|Divaguer|Diverger|Diversifier|Diviniser|Diviser|Divorcer|Divulguer|Djibser|Documenter|Dodeliner|Dogmatiser|Doguer|Doigter|Doler|Domestiquer|Domicilier|Dominer|Dompter|Donner|Doper|Dorer|Dorloter|Doser|Doter|Douer|Doubler|Doublonner|Doucher|Douiller|Douter|Drayer|Dracher|Dragéifier|Drageonner|Draguer|Drainer|Dramatiser|Drapeler|Draper|Draver|Dresser|Dribbler|Driller|Driver|Droguer|Droper|Drosser|Dulcifier|Duper|Duplexer|Dupliquer|Durer|Dynamiser|Dynamiter|Ébarber|Ébaucher|Ébavurer|Éberluer|Ébiseler|Éborgner|Ébosser|Ébouer|Ébouillanter|Ébouler|Ébourgeonner|Ébouriffer|Ébourrer|Ébouter|Ébouzer|Ébrécher|Ébraiser|Ébrancher|Ébranler|Ébraser|Ébrouer|Ébruiter|Ébruter|Écacher|Écaffer|Écailler|Écaler|Écanguer|Écarbouiller|Écarquiller|Écarteler|Écarter|Échafauder|Échalasser|Échanger|Échancrer|Échanfreiner|Échantillonner|Échapper|Échardonner|Écharner|Écharper|Échauder|Échauffer|Échauler|Échaumer|Échelonner|Écheniller|Écheveler|Échiner|Échopper|Échouer|Écimer|Éclabousser|Éclairer|Éclater|Éclipser|Éclisser|Écloper|Écluser|Écobuer|Écœurer|Économiser|Écoper|Écorcer|Écorer|Écorcher|Écorner|Écornifler|Écosser|Écouler|Écourter|Écouter|Écouvillonner|Écrémer|Écrabouiller|Écraser|Écrêter|Écrivailler|Écrivasser|Écrouer|Écroûter|Écuisser|Éculer|Écumer|Écurer|Écussonner|Édenter|Édicter|Édifier|Éditer|Éditionner|Édulcorer|Éduquer|Éfaufiler|Effacer|Effaner|Effarer|Effaroucher|Effectuer|Efféminer|Effeuiller|Effiler|Effilocher|Efflanquer|Effleurer|Effluver|Effondrer|Effrayer|Effranger|Effriter|Égayer|Égaler|Égaliser|Égarer|Égnaffer|Égoïner|Égorger|Égoutter|Égrener|Égrainer|Égrapper|Égratigner|Égravillonner|Égriser|Égruger|Égueuler|Éhouper|Éjaculer|Éjarrer|Éjecter|Éjointer|Élever|Élaborer|Élaguer|Élancer|Électrifier|Électriser|Électrocuter|Électrolyser|Électroniser|Élider|Élimer|Éliminer|Élinguer|Éloigner|Élonger|Éluer|Élucider|Élucubrer|Éluder|Émécher|Émier|Émacier|Émailler|Émaner|Émanciper|Émarger|Émasculer|Embabouiner|Emballer|Emballotter|Emballuchonner|Embarbouiller|Embarder|Embarquer|Embarrer|Embarrasser|Embastiller|Embastionner|Embâter|Embaucher|Embaumer|Embecquer|Embéguiner|Emberlificoter|Embêter|Embidonner|Embistrouiller|Emblaver|Embobeliner|Embobiner|Emboîter|Embosser|Embotteler|Embouer|Emboucaner|Emboucher|Embouquer|Embourber|Embourgeoiser|Embourrer|Embourrmaner|Embouter|Embouteiller|Embrayer|Embreler|Embrener|Embrever|Embrancher|Embraquer|Embraser|Embrasser|Embrigader|Embringuer|Embrocher|Embroncher|Embrouiller|Embroussailler|Embrumer|Embuer|Embusquer|Émender|Émerger|Émerillonner|Émeriser|Émerveiller|Émétiser|Émietter|Émigrer|Émincer|Emmener|Emmétrer|Emmagasiner|Emmailloter|Emmancher|Emmannequiner|Emmarger|Emmêler|Emménager|Emmerder|Emmieller|Emmitonner|Emmitoufler|Emmortaiser|Emmotter|Emmouscailler|Emmurer|Émonder|Émorfiler|Émotionner|Émotter|Émoucher|Émoucheter|Émousser|Émoustiller|Empeser|Empaffer|Empailler|Empaler|Empalmer|Empanacher|Empanner|Empapahouter|Empapaouter|Empapilloter|Empaqueter|Emparquer|Empâter|Empatter|Empaumer|Empêcher|Empeigner|Empener|Empenner|Empercher|Emperler|Empester|Empêtrer|Empiéter|Empieger|Empierrer|Empiffrer|Empiler|Empirer|Emplafonner|Emplâtrer|Employer|Emplumer|Empocher|Empoigner|Empoisonner|Empoisser|Empoissonner|Emporter|Empoter|Empourprer|Empoussiérer|Empresurer|Emprisonner|Emprunter|Émuler|Émulsifier|Émulsionner|Encager|Encabaner|Encadrer|Encagouler|Encaisser|Encanailler|Encaper|Encapsuler|Encapuchonner|Encaquer|Encarrer|Encarter|Encartonner|Encartoucher|Encaserner|Encastrer|Encaustiquer|Encaver|Enceinter|Encelluler|Encenser|Encercler|Enchaîner|Enchanteler|Enchanter|Enchaperonner|Encharner|Enchâsser|Enchatonner|Enchausser|Enchemiser|Enchetarder|Enchevaucher|Enchevêtrer|Enchifrener|Enchtiber|Enchtourber|Encirer|Enclaver|Enclencher|Encliqueter|Encloîtrer|Encloquer|Enclouer|Encocher|Encoder|Encoffrer|Encoller|Encombrer|Encorder|Encorner|Encourager|Encrer|Encrasser|Encrêper|Encrister|Encroûter|Enculer|Encuver|Endauber|Endenter|Endetter|Endeuiller|Endêver|Endiabler|Endiguer|Endimancher|Endivisionner|Endoctriner|Endommager|Endosser|Endurer|Énerver|Enfaîter|Enfanter|Enfariner|Enfermer|Enferrer|Enfiévrer|Enficher|Enfieller|Enfiler|Enflécher|Enfler|Enflammer|Enfleurer|Enfoirer|Enfoncer|Enfouiller|Enfourailler|Enfourcher|Enfourner|Enfumer|Enfûter|Enfutailler|Engager|Engainer|Engamer|Engargousser|Engaver|Engazonner|Engendrer|Engerber|Englacer|Englober|Engluer|Engober|Engommer|Engoncer|Engorger|Engouffrer|Engouler|Engrener|Engraisser|Engranger|Engraver|Engrosser|Engrumeler|Engueuler|Enguirlander|Enharnacher|Enherber|Énieller|Enivrer|Enjamber|Enjaveler|Enjôler|Enjoliver|Enjoncer|Enjouer|Enjuguer|Enjuponner|Enlever|Enlier|Enlacer|Enliasser|Enligner|Enliser|Enluminer|Ennuyer|Ennuager|Énoncer|Enouer|Enquêter|Enquiller|Enquiquiner|Enrayer|Enrager|Enraciner|Enrailler|Enrégimenter|Enregistrer|Enrener|Enrésiner|Enrhumer|Enrober|Enrocher|Enrôler|Enrouer|Enrouiller|Enrouler|Enrubanner|Ensabler|Ensaboter|Ensacher|Ensaisiner|Ensanglanter|Ensauvager|Enseigner|Ensemencer|Enserrer|Ensiler|Ensoleiller|Ensorceler|Ensoufrer|Enstérer|Ensuquer|Enter|Entabler|Entacher|Entailler|Entamer|Entaquer|Entarter|Entartrer|Entasser|Enténébrer|Entériner|Enterrer|Entêter|Enthousiasmer|Enticher|Entifler|Entoiler|Entôler|Entonner|Entorser|Entortiller|Entourer|Entourlouper|Entrer|Entraîner|Entraver|Entre-heurter|Entrebâiller|Entrechoquer|Entrecouper|Entrecroiser|Entrelacer|Entrelarder|Entremêler|Entreposer|Entretoiser|Entrevoûter|Entuber|Énucléer|Énumérer|Envier|Envoyer|Envaser|Envelopper|Envenimer|Enverger|Enverguer|Enviander|Envider|Environner|Envisager|Envoûter|Épeler|Épier|Épaler|Épamprer|Épancher|Épanneler|Épanner|Épargner|Éparpiller|Épastrouiller|Épater|Épaufrer|Épauler|Épépiner|Éperonner|Épeuler|Épeurer|Épicer|Épierrer|Épiler|Épiloguer|Épincer|Épiner|Épinceler|Épinceter|Épingler|Épisser|Éployer|Éplucher|Épointer|Éponger|Épontiller|Épouiller|Époumoner|Épouser|Épousseter|Époustoufler|Époutier|Épouvanter|Éprouver|Épucer|Épuiser|Épurer|Équerrer|Équeuter|Équilibrer|Équiper|Équipoller|Équivoquer|Érayer|Éradiquer|Érafler|Érailler|Éreinter|Ergoter|Ériger|Éroder|Érotiser|Errer|Éructer|Esbroufer|Escalader|Escamoter|Escarmoucher|Escarper|Escarrifier|Escher|Esclavager|Escobarder|Escoffier|Escompter|Escorter|Escrimer|Escroquer|Esgourder|Espérer|Espacer|Espalmer|Espionner|Espoliner|Espouliner|Esquicher|Esquinter|Esquisser|Esquiver|Essayer|Essaimer|Essanger|Essarter|Esseuler|Essorer|Essoriller|Essoucher|Essouffler|Essuyer|Estamper|Estampiller|Estérifier|Esthétiser|Estimer|Estiver|Estocader|Estomaquer|Estomper|Estoquer|Estrapader|Estrapasser|Estropier|Étayer|Étager|Établer|Étaler|Étalager|Étalinguer|Étalonner|Étamer|Étamper|Étancher|Étançonner|Étarquer|Étatiser|Éterniser|Éternuer|Étêter|Éthérifier|Éthériser|Éthniciser|Étinceler|Étioler|Étiqueter|Étirer|Étoffer|Étoiler|Étonner|Étouffer|Étouper|Étoupiller|Étrangler|Étraper|Étrenner|Étrésillonner|Étriller|Étriper|Étripailler|Étriquer|Étronçonner|Étudier|Étuver|Euphoriser|Européaniser|Évacuer|Évaluer|Évangéliser|Évaporer|Évaser|Éveiller|Éventer|Éventrer|Évider|Évincer|Éviter|Évoluer|Évoquer|Exécrer|Exacerber|Exagérer|Exalter|Examiner|Exaspérer|Exaucer|Excéder|Excaver|Exceller|Excentrer|Excepter|Exciper|Exciser|Exciter|Excommunier|Excorier|Excréter|Excracher|Excursionner|Excuser|Exécuter|Exemplifier|Exempter|Exercer|Exfiltrer|Exfolier|Exhaler|Exhausser|Exhéréder|Exhiber|Exhorter|Exhumer|Exiger|Exiler|Exister|Exonérer|Exorciser|Expier|Expatrier|Expectorer|Expédier|Expérimenter|Expertiser|Expirer|Expliciter|Expliquer|Exploiter|Explorer|Exploser|Exporter|Exposer|Exprimer|Exproprier|Expulser|Expurger|Exsuder|Exténuer|Extérioriser|Exterminer|Externer|Externaliser|Extirper|Extorquer|Extourner|Extrader|Extrapoler|Extravaguer|Extravaser|Extruder|Exulcérer|Exulter|Fier|Fabriquer|Fabuler|Facetter|Fâcher|Faciliter|Façonner|Factoriser|Facturer|Fader|Fagoter|Faignanter|Fainéanter|Fainéantiser|Faisander|Faloter|Falsifier|Faluner|Familiariser|Faner|Fanatiser|Fanfaronner|Fanfrelucher|Fantasmer|Faonner|Farder|Farfouiller|Farguer|Fariner|Farter|Faseyer|Fasier|Fasciner|Fasciser|Fatiguer|Fatrasser|Faubérer|Faucarder|Faucher|Fauciller|Fauconner|Faufiler|Fausser|Fauter|Favoriser|Faxer|Fayoter|Féconder|Féculer|Fédérer|Fédéraliser|Feignanter|Feinter|Fêler|Féliciter|Féminiser|Fendiller|Fenestrer|Fenêtrer|Ferler|Fermer|Fermenter|Ferrer|Ferrailler|Ferrouter|Fertiliser|Fesser|Festiner|Festoyer|Festonner|Fêter|Féticher|Fétichiser|Feuiller|Feuilleter|Feuilletiser|Feuler|Feutrer|Figer|Fiabiliser|Fiancer|Ficeler|Ficher|Fidéliser|Fieffer|Fienter|Fignoler|Figurer|Filer|Fileter|Filialiser|Filigraner|Filmer|Filocher|Filouter|Filtrer|Finaliser|Financer|Financiariser|Finasser|Finlandiser|Fiscaliser|Fissionner|Fissurer|Fixer|Flécher|Flageller|Flageoler|Flagorner|Flairer|Flamber|Flamboyer|Flâner|Flancher|Flânocher|Flanquer|Flaquer|Flasher|Flatter|Flauper|Flemmarder|Fleurer|Flexibiliser|Flibuster|Flingoter|Flinguer|Flipper|Fliquer|Flirter|Floconner|Floculer|Floquer|Flotter|Flouer|Flouser|Fluer|Fluber|Fluctuer|Fluidifier|Fluidiser|Fluoriser|Flurer|Flûter|Fluxer|Focaliser|Foirer|Foisonner|Folâtrer|Folichonner|Folioter|Folkloriser|Fomenter|Foncer|Fonctionner|Fonctionnariser|Fonder|Forcer|Forer|Forger|Forjeter|Forlancer|Forligner|Forlonger|Former|Formaliser|Formater|Formicaliser|Formoler|Formuler|Forniquer|Fortifier|Fossiliser|Fossoyer|Fouger|Fouailler|Fouder|Foudroyer|Fouetter|Fouiller|Fouiner|Fouler|Fourailler|Fourber|Fourcher|Fourgonner|Fourguer|Fourmiller|Fourrer|Fourrager|Fourvoyer|Frayer|Fréter|Fracasser|Fractionner|Fracturer|Fragiliser|Fragmenter|Fraiser|Framboiser|Franger|Franchiser|Franciser|Francophoniser|Fransquillonner|Frapper|Fraterniser|Frauder|Fredonner|Frégater|Freiner|Frelater|Fréquenter|Frétiller|Fretter|Fricasser|Fricoter|Frictionner|Frigorifier|Frigorifuger|Frimer|Fringuer|Friper|Friponner|Friquer|Friser|Frisotter|Frissonner|Fristouiller|Fritter|Froisser|Frôler|Froncer|Fronder|Frotter|Frouer|Froufrouter|Frousser|Fructifier|Frusquer|Frustrer|Fuguer|Fuiter|Fulgurer|Fulminer|Fumer|Fumiger|Fureter|Fuseler|Fuser|Fusiller|Fusionner|Fustiger|Geler|Gérer|Gager|Gabarier|Gabionner|Gâcher|Gadgétiser|Gaffer|Gafouiller|Gagner|Gainer|Galéjer|Galérer|Galantiser|Galber|Galipoter|Galonner|Galoper|Galvaniser|Galvauder|Gameler|Gambader|Gamberger|Gambiller|Gaminer|Gangrener|Gangréner|Ganser|Ganter|Garer|Garancer|Garder|Gargoter|Gargouiller|Garrotter|Gasconner|Gaspiller|Gâter|Gâtifier|Gaufrer|Gauler|Gaver|Gazer|Gazéifier|Gazonner|Gazouiller|Gélatiner|Gélatiniser|Gélifier|Géminer|Gemmer|Gener|Genérer|Généraliser|Géométriser|Gercer|Gerber|Germer|Germaniser|Gesticuler|Giboyer|Gicler|Gifler|Gigoter|Gironner|Girouetter|Gîter|Givrer|Glacer|Glaglater|Glairer|Glaiser|Glaner|Glander|Glandouiller|Glavioter|Glaviotter|Gléner|Gletter|Glisser|Globaliser|Glorifier|Gloser|Glouglouter|Glousser|Gloutonner|Glycériner|Gngner|Goaler|Gober|Gobeter|Gobelotter|Goder|Godailler|Godiller|Godronner|Goguenarder|Goinfrer|Gommer|Gomorrhiser|Gonder|Gondoler|Gonfler|Gongonner|Gorger|Gouacher|Gouailler|Goualer|Gouaper|Goudronner|Gouger|Gougnoter|Gougnotter|Goujonner|Goupiller|Goupillonner|Gourmer|Gourmander|Goûter|Goutter|Gouttiner|Gouverner|Gréer|Grener|Gréser|Grever|Gréver|Gracier|Graduer|Graffiter|Grafigner|Grailler|Graillonner|Graisser|Gramer|Grammaticaliser|Graniter|Granuler|Graphiter|Grappiller|Grasseyer|Graticuler|Gratifier|Gratiner|Gratouiller|Gratter|Grattouiller|Graver|Gravillonner|Graviter|Greciser|Grecquer|Greffer|Grêler|Grelotter|Greneler|Grenailler|Grenouiller|Grésiller|Gribouiller|Griffer|Griffonner|Grignoter|Grigriser|Griller|Grillager|Grimer|Grimacer|Grimper|Grincer|Grincher|Gripper|Griser|Grisailler|Grisoler|Grisoller|Grisonner|Griveler|Grmguer|Grogner|Grognasser|Grognonner|Grommeler|Gronder|Grossoyer|Grouiller|Groûler|Groumer|Grouper|Gruger|Guéer|Guerroyer|Guêtrer|Guetter|Gueuler|Gueuletonner|Gueuser|Guider|Guigner|Guillemeter|Guillocher|Guillotiner|Guincher|Guinder|Guindailler|Guiper|Héler|Habiliter|Habiller|Habiter|Habituer|Hâbler|Hacher|Hachurer|Halener|Haler|Hâler|Haleter|Halbrener|Halkiner|Halluciner|Hameçonner|Hancher|Handeler|Handicaper|Hannetonner|Hanter|Happer|Haranguer|Harasser|Harceler|Harder|Haricoter|Harmoniser|Harnacher|Harper|Harpailler|Harponner|Hasarder|Hâter|Haubaner|Hausser|Haver|Hébéter|Héberger|Hébraïser|Hélitreuiller|Helléniser|Herber|Herbager|Herbeiller|Herboriser|Hercher|Hérisser|Hérissonner|Hériter|Herser|Hésiter|Heurter|Hiberner|Hiérarchiser|Hisser|Historier|Hiverner|Hocher|Holographier|Homogénéifier|Homogénéiser|Homologuer|Hongrer|Hongroyer|Honorer|Hoqueter|Horrifier|Horripiler|Hospitaliser|Houer|Houblonner|Houper|Houpper|Hourailler|Hourder|Houspiller|Housser|Houssiner|Huer|Hucher|Huiler|Hululer|Humer|Humaniser|Humecter|Humidifier|Humilier|Hurler|Hybrider|Hydrater|Hydrofuger|Hydrogéner|Hydrolyser|Hypertrophier|Hypnotiser|Hypostasier|Hypothéquer|Iconiser|Idéaliser|Identifier|Idéologiser|Idiotiser|Idolâtrer|Ignifuger|Ignorer|Illuminer|Illusionner|Illustrer|Imager|Imaginer|Imbiber|Imbriquer|Imiter|Immatérialiser|Immatriculer|Immerger|Immigrer|Immobiliser|Immoler|Immortaliser|Immuniser|Impétrer|Impacter|Impatienter|Impatroniser|Imperméabiliser|Implanter|Implémenter|Impliquer|Implorer|Imploser|Importer|Importuner|Imposer|Imprégner|Impressionner|ImprimerÎmprouver|Improviser|Impulser|Imputer|Inactiver|Inaugurer|Incarcérer|Incarner|Incendier|Incinérer|Inciser|Inciter|Incliner|Incomber|Incommoder|Incorporer|Incrémenter|Incriminer|Incruster|Incuber|Inculper|Inculquer|Incurver|Indaguer|Indemniser|Indexer|Indicer|Indifférer|Indigner|Indiquer|Indisposer|Individualiser|Indulgencier|Indurer|Industrialiser|Inférer|Infantiliser|Infatuer|Infecter|Inféoder|Inférioriser|Infester|Infibuler|Infiltrer|Infirmer|Infliger|Influer|Influencer|Informer|Informatiser|Infuser|Ingérer|Ingurgiter|Inhaler|Inhiber|Inhumer|Initier|Initialer|Initialiser|Injecter|Injurier|Innerver|Innocenter|Innover|Inoculer|Inonder|Inquiéter|Insérer|Insculper|Inséminer|Insensibiliser|Insinuer|Insister|Insoler|Insolubiliser|Insonoriser|Inspecter|Inspirer|Installer|Instaurer|Instiguer|Instiller|Instituer|Institutionnaliser|Instrumenter|Instrumentaliser|Insuffler|Insulter|Insupporter|Intégrer|Intailler|Intellectualiser|Intensifier|Intenter|Intercéder|Intercaler|Intercepter|Interclasser|Interconnecter|Intéresser|Interférer|Interfolier|Intérioriser|Interjeter|Interligner|Interloquer|Interner|Internationaliser|Interpeller|Interpoler|Interposer|Interpréter|Interroger|Interviewer|Intimer|Intimider|Intituler|Intoxiquer|Intriguer|Intriquer|Introniser|Intuber|Inutiliser|Invalider|Invectiver|Inventer|Inventorier|Inverser|Inviter|Invoquer|Ioder|Iodler|Ioniser|Iouler|Iriser|Ironiser|Irradier|Irriguer|Irriter|Islamiser|Isoler|Itérer|Italianiser|Ivoiriser|Ixer|Jeter|Jabler|Jaboter|Jacasser|Jachérer|Jacter|Jaffer|Jalonner|Jalouser|Jambonner|Japoniser|Japonner|Japper|Jardiner|Jargonner|Jarreter|Jaser|Jasper|Jaspmer|Jauger|Javeler|Javer|Javelliser|Jeûner|Jobarder|Jocoler|Jodler|Jogger|Jointoyer|Joncer|Joncher|Jongler|Jouer|Jouailler|Jouter|Jouxter|Juger|Jubiler|Jucher|Judaïser|Juguler|Jumeler|Juponner|Jurer|Justicier|Justifier|Juter|Juxtaposer|Kaoter|Kaotiser|Kératiniser|Kidnapper|Kilométrer|Klaxonner|Koter|Layer|Lécher|Léguer|Léser|Lever|Lier|Lacer|Labelliser|Labialiser|Labourer|Lacérer|Lacaniser|Lâcher|Laïciser|Lainer|Laisser|Laitonner|Laïusser|Lamer|Lambiner|Lambrisser|Lamenter|Laminer|Lamper|Lancer|Langer|Lancequiner|Lanciner|Langueyer|Lansquiner|Lanterner|Laper|Lapider|Lapidifier|Lapiner|Laquer|Larder|Lardonner|Larguer|Larmoyer|Lasser|Latiniser|Latter|Laver|Légaliser|Légender|Légiférer|Légitimer|Lemmatiser|Lénifier|Lésiner|Lessiver|Lester|Leurrer|Léviger|Léviter|Levretter|Lézarder|Liéger|Liaisonner|Liarder|Libérer|Libeller|Libéraliser|Licencier|Licher|Lichetrogner|Liciter|Lifter|Ligaturer|Ligner|Ligoter|Liguer|Limer|Limander|Limiter|Limoger|Limoner|Limousiner|Linger|Liquéfier|Liquider|Liserer|Lisérer|Lisbroquer|Lisser|Lister|Liter|Lithographier|Litroner|Livrer|Loger|Lober|Lobotomiser|Localiser|Locher|Lock-outer|Lockouter|Lofer|Loguer|Longer|Looser|Loquer|Lorgner|Lotionner|Louer|Louanger|Loucher|Loufer|Louper|Louquer|Lourer|Lourder|Louver|Louveter|Louvoyer|Lover|Luger|Lubrifier|Luncher|Lustrer|Luter|Lutiner|Lutter|Luxer|Lyncher|Lyophiliser|Lyrer|Lyser|Mécher|Mener|Métrer|Macérer|Macadamiser|Mâcher|Machicoter|Machiner|Mâchonner|Mâchouiller|Mâchurer|Macler|Maçonner|Macquer|Maculer|Madéfier|Madériser|Madrigaliser|Maganer|Magasiner|Magnétiser|Magnétoscoper|Magnifier|Magoter|Magouiller|Mailler|Maîtriser|Majorer|Malaxer|Malléabiliser|Mallouser|Malmener|Malter|Maltraiter|Malverser|Mamelonner|Manéger|Manger|Manier|Manager|Manchonner|Mander|Mandater|Mangeotter|Maniérer|Manifester|Manigancer|Manipuler|Mannequmer|Manœuvrer|Manoquer|Manquer|Mansarder|Manucurer|Manufacturer|Manutentionner|Mapper|Maquer|Maquetter|Maquignonner|Maquiller|Marger|Marier|Marabouter|Maratoner|Marauder|Maraver|Marbrer|Marcher|Marchander|Marcotter|Margauder|Marginer|Marginaliser|Margoter|Margotter|Mariner|Marivauder|Marmiter|Marmonner|Marmoriser|Marmotter|Marner|Maronner|Maroquiner|Maroufler|Marquer|Marqueter|Marronner|Marsouiner|Marteler|Martyriser|Marxiser|Masculiniser|Masquer|Masser|Massacrer|Massicoter|Massifier|Mastéguer|Mastiquer|Masturber|Mater|Mâter|Matabicher|Matcher|Matelasser|Matérialiser|Materner|Materniser|Mathématiser|Mâtiner|Matouser|Matraquer|Matricer|Matriculer|Maturer|Maugréer|Maximaliser|Maximiser|Mazouter|Mécaniser|Mécontenter|Médailler|Médiatiser|Médicaliser|Médicamenter|Médiser|Méditer|Méduser|Megisser|Mégoter|Méjuger|Mêler|Mélanger|Mémoriser|Menacer|Ménager|Mendier|Mendigoter|Menotter|Mensualiser|Mensurer|Mentionner|Menuiser|Mépriser|Mercantiliser|Merceriser|Merder|Merdoyer|Meringuer|Mériter|Mésallier|Mésestimer|Mesurer|Mésuser|Métaboliser|Métalliser|Métamorphiser|Métamorphoser|Métaphoriser|Météoriser|Métisser|Meubler|Meugler|Meuler|Miauler|Michetonner|Microfilmer|Microniser|Mignarder|Mignoter|Migrer|Mijoler|Mijoter|Militer|Militariser|Millésimer|Mimer|Miner|Minauder|Minéraliser|Miniaturer|Miniaturiser|Minimiser|Minorer|Minuter|Mirer|Miroiter|Miser|Misérer|Miter|Mitarder|Mithridatiser|Mitiger|Mitonner|Mitrailler|Mixer|Mixtionner|Mobiliser|Modeler|Modérer|Modéliser|Moderniser|Modifier|Moduler|Mofler|Moirer|Moiser|Moissonner|Moiter|Moleter|Molester|Mollarder|Molletonner|Momifier|Monder|Mondialiser|Monétiser|Monnayer|Monologuer|Monopoliser|Monseigneuriser|Monter|Montrer|Moquer|Moquetter|Moraliser|Morceler|Mordancer|Mordiller|Mordorer|Morfaler|Morfiler|Morfler|Morigéner|Mornifler|Mortaiser|Mortifier|Motamoter|Motionner|Motiver|Motoriser|Moueter|Moucher|Moucheter|Moucharder|Moucheronner|Mouetter|Moufeter|Moufter|Mouiller|Mouler|Mouliner|Moulurer|Mouronner|Mousser|Moutonner|Mouver|Mouvementer|Moyenner|Muer|Mucher|Mugueter|Muloter|Multiplier|Multiplexer|Municipaliser|Munitionner|Murer|Murailler|Murmurer|Museler|Muser|Musarder|Muscler|Musiquer|Musquer|Musser|Muter|Mutiler|Mutualiser|Mystifier|Mythifier|Nier|Nager|Nacrer|Nanifier|Napper|Narguer|Narrer|Nasaliser|Nasarder|Nasiller|Natchaver|Nationaliser|Natter|Naturaliser|Naufrager|Naviguer|Navrer|Néantiser|Nécessiter|Nécroser|Négliger|Négocier|Négrifier|Neiger|Neigeoter|Nerver|Nervurer|Nettoyer|Neutraliser|Niaiser|Nicher|Nickeler|Nicotiniser|Nidifier|Nieller|Nigauder|Nigérianiser|Nimber|Nipper|Nitrer|Nitrater|Nitrifier|Nitrurer|Niveler|Nivaquiner|Nocer|Noyer|Nobscuriter|Noliser|Nomadiser|Nombrer|Nominaliser|Nommer|Noncer|Noper|Normaliser|Noter|Notifier|Nouer|Nover|Noyauter|Nuer|Nuancer|Nucléer|Nucléariser|Numériser|Numéroter|Obérer|Objecter|Objectiver|Objurguer|Obliger|Obliquer|Oblitérer|Obnubiler|Obombrer|Obséder|Observer|Obstruer|Obtempérer|Obturer|Obvier|Occasionner|Occidentaliser|Occulter|Occuper|Ocrer|Octavier|Octroyer|OctuplerŒilletonnerŒuvrer|Offenser|Officier|Officialiser|Offusquer|Oiseler|Ombrer|Ombrager|Ondoyer|Onduler|Opérer|Opacifier|Opaliser|Opiacer|Opiner|Opposer|Oppresser|Opprimer|Opter|Optimaliser|Optimiser|Oraliser|Oranger|Orbiter|Orchestrer|Ordonner|Ordonnancer|Organiser|Organsmer|Orienter|Oringuer|Orner|Ornementer|Orthographier|Oser|Osciller|Ossifier|OstraciserÔter|Ouater|Ouatiner|Oublier|Ouiller|Ourler|Outiller|Outrer|Outrager|Outrepasser|Ouvrer|Ouvrager|Ovaliser|Ovationner|Ovuler|Oxyder|Oxygéner|Ozoniser|Payer|Pécher|Peler|Peser|Péter|Pager|Pacager|Pacifier|Pacquer|Pactiser|Pagayer|Pagamser|Paginer|Pailler|Pailleter|Paillarder|Paillassonner|Paillonner|Paisseler|Palabrer|Palancrer|Palangrer|Palanguer|Palanquer|Palataliser|Paleter|Palettiser|Palisser|Palissader|Palissonner|Pallier|Palmer|Paloter|Palper|Palpiter|Pâmer|Paner|Panacher|Panifier|Paniquer|Panner|Panneauter|Panoramiquer|Panser|Panteler|Pantoufler|Paperasser|Papillonner|Papilloter|Papoter|Papouiller|Parer|Parier|Parachever|Parachuter|Parader|Parafer|Paraffiner|Paraisonner|Paralléliser|Paralyser|Paramétrer|Parangonner|Parapher|Paraphraser|Parasiter|Parceller|Parcellariser|Parcelliser|Parcheminer|Pardonner|Parementer|Paresser|Parfiler|Parfumer|Parkériser|Parler|Parlementer|Parloter|Parodier|Parquer|Parqueter|Parrainer|Parsemer|Partager|Participer|Particulariser|Partouzer|Passer|Passementer|Passepoiler|Passionner|Pasteller|Pasteuriser|Pasticher|Pastiller|Pastiquer|Pastoriser|Pâter|Patafioler|Patauger|Pateliner|Patenter|Patienter|Patiner|Pâtisser|Patoiser|Patouiller|Patrociner|Patronner|Patrouiller|Patter|Pâturer|Paumer|Paumoyer|Paupériser|Pauser|Paver|Pavoiser|Peaufiner|Peausser|Pêcher|Pecquer|Pédaler|Pédantiser|Peigner|Peiner|Peinturer|Peinturlurer|Peller|Pelleter|Peloter|Pelotonner|Pelucher|Pembeniser|Pénétrer|Pénaliser|Pencher|Pendiller|Pendouiller|Penduler|Penser|Pensionner|Pepier|Percer|Percher|Percuter|Perdurer|Pérégriner|Pérenniser|Péréquater|Perfectionner|Perforer|Perfuser|Péricliter|Périphraser|Perler|Permanenter|Perméabiliser|Permuter|Perorer|Peroxyder|Perpétrer|Perpétuer|Perquisitionner|Persécuter|Persévérer|Persiffler|Persifler|Persiller|Persister|Personnaliser|Personnifier|Persuader|Perturber|Pervibrer|Pessigner|Pester|Pesteller|Pestiférer|Pétarader|Pétarder|Pétiller|Petit-déjeuner|Pétitionner|Pétocher|Pétrarquiser|Pétrifier|Pétuner|Peupler|Phagocyter|Phantasmer|Phaser|Philosopher|Phosphater|Phosphorer|Photocopier|Photographier|Phraser|Phrasicoter|Piéger|Piéter|Piger|Piaffer|Piailler|Pianoter|Piauler|Picoler|Picorer|Picoter|Picter|Pierrer|Piétiner|Pifer|Piffer|Pigeonner|Pigmenter|Pignocher|Piler|Pîler|Piller|Pilonner|Pilorier|Piloter|Piluler|Pimer|Pimenter|Pincer|Pinailler|Pindariser|Pindouler|Pingler|Pinter|Pioger|Piocher|Pioncer|Pionner|Piper|Piquer|Piqueter|Pique-niquer|Piquouser|Pirater|Pirouetter|Pisser|Pissoter|Pister|Pistonner|Piter|Pitancher|Pitonner|Pivoter|Plier|Placer|Placarder|Placoter|Plafonner|Plagier|Plaider|Plainer|Plaisanter|Planer|Plancher|Planchéier|Planifier|Planquer|Planter|Plaquer|Plasmifier|Plastifier|Plastiquer|Plastronner|Platiner|Platiniser|Plâtrer|Plébisciter|Plecquer|Pleurer|Pleurnicher|Pleuvasser|Pleuviner|Pleuvioter|Pleuvoter|Plisser|Ployer|Plomber|Plonger|Ploquer|Plucher|Plumer|Plussoyer|Pluviner|Pocher|Pocheter|Podzoliser|Poêler|Poétiser|Pogner|Poignarder|Poinçonner|Pointer|Pointiller|Poireauter|Poiroter|Poisser|Poivrer|Polariser|Polémiquer|Policer|Polissonner|Politiquer|Politiser|Polluer|Polycopier|Polymériser|Pommer|Pommader|Pommeler|Pomper|Pomponner|Poncer|Ponctionner|Ponctuer|Pondérer|Ponter|Pontifier|Pontiller|Populariser|Poquer|Porphyriser|Porter|Portraiturer|Poser|Positionner|Positiver|Posséder|Poster|Postdater|Posticher|Postillonner|Postposer|Postsynchroniser|Postuler|Poter|Potasser|Potentialiser|Potiner|Poudrer|Poudroyer|Pouffer|Pouiller|Pouliner|Pouponner|Pourchasser|Pourlécher|Pousser|Poutser|Prier|Praliner|Pratiquer|Préacheter|Preaviser|Précéder|Precanser|Précautionner|Prêcher|Préchauffer|Précipiter|Préciser|Précompter|Préconiser|Prédécéder|Prédestiner|Prédéterminer|Prédiquer|Prédisposer|Prédominer|Préempter|Préexister|Préférer|Préfacer|Préfigurer|Préfixer|Préformer|Préjuger|Préjudicier|Prélever|Préléguer|Préluder|Préméditer|Prénommer|Préoccuper|Préordonner|Prépayer|Préparer|Prépensionner|Préposer|Prérégler|Présager|Présélectionner|Présenter|Préserver|Présider|Presser|Pressurer|Pressuriser|Prester|Présumer|Présupposer|Presurer|Prêter|Prétexter|Prévariquer|Primer|Primariser|Priser|Priver|Privatiser|Privilégier|Prober|Procéder|Processionner|Proclamer|Procréer|Procurer|Prodiguer|Proférer|Profaner|Professer|Professionnaliser|Profiler|Profiter|Programmer|Progresser|Prohiber|Projeter|Prolétariser|Proliférer|Prolonger|Promener|Promotionner|Promulguer|Proner|Prononcer|Pronostiquer|Propager|Prophétiser|Proportionner|Proposer|Propulser|Proroger|Prosaïser|Prosodier|Prospérer|Prospecter|Prosterner|Prostituer|Protéger|Protester|Prouter|Prouver|Proverbialiser|Provigner|Provisionner|Provoquer|Pruner|Psalmodier|Psychanalyser|Psychiatriser|Puer|Publier|Puddler|Puiser|Pulluler|Pulper|Pulser|Pulvériser|Punaiser|Purger|Purifier|Putréfier|Pyramider|Pyrograver|Quadriller|Quadrupler|Qualifier|Quantifier|Quarderonner|Quarrer|Quarter|Quartager|Quémander|Quereller|Questionner|Quêter|Queuter|Quiller|Quimper|Quintessencier|Quintupler|Quitter|Quittancer|Quotter|Rayer|Réer|Régler|Régner|Rager|Rabâcher|Rabaisser|Rabanter|Rabibocher|Rabioter|Rabistoquer|Râbler|Raboter|Rabouiller|Rabouter|Rabrouer|Raccommoder|Raccompagner|Raccorder|Raccoutrer|Raccoutumer|Raccrocher|Raccuser|Raccuspoter|Racheter|Raciner|Racketter|Racler|Racoler|Raconter|Rader|Radier|Radicaliser|Radiner|Radiobaliser|Radiodiffuser|Radiographier|Radioguider|Radioscoper|Radiotélégraphier|Radoter|Radouber|Raffiner|Raffoler|Raffûter|Rafistoler|Rafler|Ragoter|Ragoûter|Ragréer|Ragrafer|Raguer|Railler|Rainer|Raineter|Rainurer|Raisonner|Rajouter|Rajuster|Râler|Ralinguer|Rallier|Ralléger|Rallonger|Rallumer|Ramener|Ramer|Rameter|Ramager|Ramailler|Ramander|Ramarrer|Ramasser|Ramastiquer|Rambiner|Ramender|Rameuter|Ramifier|Ramoner|Ramper|Ranger|Rancarder|Rançonner|Randonner|Ranimer|Raouster|Râper|Rapapilloter|Rapatrier|Rapetasser|Rapetisser|Rapiecer|Rapiéceter|Rapiner|Rapipoter|Rapmer|Rappeler|Rapper|Rapparier|Rappareiller|Rappliquer|Rapporter|Rapprocher|Rappropner|Rapproprier|Rapprovisionner|Raquer|Raréfier|Rarranger|Raser|Rassasier|Rassembler|Rasséréner|Rassoter|Rassurer|Râteler|Rater|Ratatiner|Ratatouiller|Ratiboiser|Ratifier|Ratiner|Ratiociner|Rationaliser|Rationner|Ratisser|Rattacher|Rattraper|Raturer|Raugmenter|Rauquer|Ravager|Ravaler|Ravauder|Ravigoter|Raviner|Ravitailler|Raviver|Rayonner|Razzier|Réabonner|Réabsorber|Réaccoutumer|Réactiver|Réactualiser|Réadapter|Réaffirmer|Réaffûter|Réajuster|Réaléser|Réaliser|Réaménager|Reamorcer|Réanimer|Réapposer|Reapprovisionner|Réargenter|Réarmer|Réarranger|Réassigner|Réassurer|Rebaisser|Rebander|Rebaptiser|Rebecter|Rebiquer|Reboiser|Rebonneter|Reborder|Reboucher|Rebouiser|Rebouter|Reboutonner|Rebraguetter|Rebroder|Rebrousser|Rebuter|Recéder|Receler|Recéler|Recéper|Recacheter|Recaler|Recalcifier|Récalcitrer|Récapituler|Recarder|Recarreler|Recaser|Recauser|Recenser|Recentrer|Réceptionner|Recercler|Rechanger|Rechanter|Rechaper|Réchapper|Recharger|Rechasser|Réchauffer|Rechausser|Rechercher|Rechigner|Rechristianiser|Rechuter|Récidiver|Réciproquer|Réciter|Réclamer|Reclaper|Reclasser|Récliner|Reclouer|Recoiffer|Récoler|Recoller|Recolorer|Récolter|Recommander|Recommencer|Recompenser|Recomposer|Recompter|Réconcilier|Recondamner|Réconforter|Recongeler|Reconnecter|Reconsidérer|Reconsolider|Reconstituer|Recopier|Recoquiller|Recorder|Recorriger|Recoucher|Recouper|Recouponner|Recourber|Recouvrer|Récréer|Recréer|Recracher|Recreuser|Récriminer|Recristalliser|Recroiser|Recroller|Recruter|Rectifier|Reculer|Reculotter|Récupérer|Recurer|Récuser|Recycler|Rédarguer|Redemander|Redémarrer|Rédiger|Rediffuser|Rédimer|Rediscuter|Redistribuer|Redonder|Redonner|Redorer|Redoubler|Redouter|Redresser|Réédifier|Rééditer|Rééduquer|Réembaucher|Réemployer|Réemprunter|Réengager|Réensemencer|Réenvoyer|Rééquilibrer|Réescompter|Réessayer|Réévaluer|Réexaminer|Réexpédier|Réexporter|Référer|Refaçonner|Refaucher|Référencer|Refermer|Referrer|Refeuilleter|Refiler|Refléter|Refluer|Reforger|Reformer|Réformer|Reformuler|Refouiller|Refouler|Refourguer|Refourrer|Réfréner|Refréner|Réfracter|Refrapper|Réfrigérer|Refuser|Réfuter|Regeler|Regagner|Régaler|Regarder|Régater|Regazonner|Régénérer|Régenter|Regimber|Régionaliser|Registrer|Réglementer|Regonfler|Regorger|Regréer|Regratter|Regreffer|Régresser|Regretter|Regrimper|Regrouper|Réguler|Régulariser|Régurgiter|Réhabiliter|Réhabituer|Rehausser|Rehydrater|Réifier|Réimperméabiliser|Réimplanter|Réimporter|Réimposer|Réimprimer|Réincarcérer|Réincorporer|Réinfecter|Réinjecter|Réinsérer|Réinstaller|Réintégrer|Réinterpréter|Réinventer|Réinviter|Réitérer|Rejeter|Rejointoyer|Rejouer|Relayer|Reléguer|Relever|Relier|Relâcher|Relancer|Relater|Relativiser|Relaver|Relaxer|Reloger|Relooker|Relouer|Reluquer|Remener|Remâcher|Remailler|Remanger|Remanier|Remaquiller|Remarier|Remarcher|Remarquer|Remastiquer|Remballer|Rembarquer|Rembarrer|Rembaucher|Rembiner|Remblayer|Remblaver|Rembobiner|Remboîter|Rembouger|Rembourrer|Rembourser|Rembroquer|Rembucher|Remédier|Remêler|Remembrer|Remémorer|Remercier|Remeubler|Remilitariser|Remiser|Remmener|Remmailler|Remmailloter|Remmancher|Remodeler|Remonter|Remontrer|Remorquer|Remoucher|Remouiller|Rempailler|Rempaqueter|Remparer|Remparder|Rempiéter|Rempiler|Remplier|Remplacer|Remployer|Remplumer|Rempocher|Rempoissonner|Remporter|Rempoter|Remprunter|Remuer|Rémunérer|Renier|Renâcler|Renarder|Renauder|Rencaisser|Rencarder|Renchaîner|Rencogner|Rencontrer|Rendosser|Reneiger|Rénetter|Renfaîter|Renfermer|Renfiler|Renfler|Renflammer|Renflouer|Renfoncer|Renforcer|Rengager|Rengainer|Rengrener|Rengréner|Rengracier|Rengraisser|Renifler|Renommer|Renoncer|Renouer|Renouveler|Rénover|Renquiller|Renseigner|Renter|Rentabiliser|Rentamer|Rentoiler|Rentrayer|Rentrer|Renvier|Renvoyer|Renvelopper|Renvenimer|Renverger|Renverser|Renvider|Réoccuper|Réopérer|Réorchestrer|Réordonner|Réordonnancer|Réorganiser|Réorienter|Repayer|Repérer|Répéter|Repairer|Reparer|Reparler|Repartager|Repasser|Repatiner|Repaver|Repêcher|Repeigner|Repenser|Repercer|Répercuter|Répertorier|Repeupler|Repincer|Repiquer|Replier|Replacer|Replanter|Replâtrer|Répliquer|Replisser|Reployer|Replonger|Repnmer|Reporter|Reposer|Repositionner|Repousser|Représenter|Réprimer|Réprimander|Repriser|Reprocher|Reprogrammer|Reprographier|Reprouver|Réprouver|Républicaniser|Répudier|Repugner|Réputer|Requalifier|Requêter|Requinquer|Réquisitionner|Rerenvoyer|Réséquer|Resaler|Resaluer|Rescinder|Resemer|Réserver|Résider|Résigner|Résilier|Résiner|Résinifier|Résister|Résonner|Résorber|Respecter|Respirer|Responsabiliser|Resquiller|Ressayer|Ressaigner|Ressasser|Ressauter|Ressemeler|Ressemer|Ressembler|Resserrer|Ressouder|Ressourcer|Ressuer|Ressuyer|Ressusciter|Rester|Restaurer|Restituer|Restructurer|Restyler|Résulter|Résumer|Retailler|Rétamer|Retaper|Retapisser|Retarder|Retâter|Retéléphoner|Retenter|Retercer|Reterser|Réticuler|Retirer|Retisser|Retomber|Retoquer|Rétorquer|Retoucher|Retourner|Retracer|Rétracter|Retraiter|Retrancher|Retravailler|Retraverser|Retremper|Rétribuer|Rétrocéder|Rétrograder|Retrousser|Retrouver|Retuber|Réunifier|Réutiliser|Révéler|Rêver|Révérer|Revacciner|Revalider|Revaloriser|Rêvasser|Réveiller|Réveillonner|Revendiquer|Réverbérer|Reverser|Revigorer|Revirer|Réviser|Revisiter|Revisser|Revitaliser|Revivifier|Revoler|Révolter|Révolutionner|Révolvériser|Révoquer|Revoter|Révulser|Rewriter|Rhabiller|Rhumer|Ribler|Ribouler|Ricaner|Ricocher|Rider|Ridiculiser|Riffauder|Rifler|Rigidifier|Rigoler|Rimer|Rimailler|Rincer|Ringarder|Rioter|Riper|Ripailler|Ripatonner|Ripoliner|Riposter|Risquer|Rissoler|Ristourner|Ritualiser|River|Riveter|Rivaliser|Rober|Robotiser|Rocher|Rocquer|Roder|Rôder|Rôdailler|Rogner|Rognonner|Romancer|Romaniser|Ronger|Ronchonner|Ronéoter|Ronéotyper|Ronfler|Ronflaguer|Ronronner|Ronsardiser|Roquer|Roser|Rosser|Roter|Rouer|Rouanner|Roucouler|Roufler|Rougeoyer|Rougnotter|Rouiller|Rouler|Roulotter|Roupiller|Rouscailler|Rouspéter|Router|Ruer|Rubaner|Rubéfier|Rucher|Rudenter|Rudoyer|Rueller|Ruginer|Ruiler|Ruiner|Ruisseler|Ruminer|Rupiner|Ruser|Russifier|Rustiquer|Rûter|Rutiler|Rythmer|Téter|Tabasser|Tabler|Tabouiser|Tabuler|Tacher|Tâcher|Tacheter|Taguer|Tailler|Taillader|Taler|Taller|Talocher|Talonner|Talquer|Taluter|Tambouler|Tambouriner|Tamiser|Tamponner|Tancer|Tanguer|Taniser|Tanner|Tanniser|Taper|Tapager|Tapiner|Tapisser|Taponner|Tapoter|Taquer|Taquiner|Tarer|Tarabiscoter|Tarabuster|Tarauder|Tarder|Tarifer|Tarter|Tartiner|Tasser|Tâter|Tatillonner|Tâtonner|Tatouer|Tauper|Taveler|Taveller|Taxer|Tayloriser|Tchadiser|Tchatcher|Techniciser|Techniser|Technocratiser|Tecker|Teiller|Teinter|Télécommander|Télécopier|Télédiffuser|Télégraphier|Téléguider|Télémétrer|Téléphoner|Télescoper|Téléviser|Télexer|Témoigner|Tempérer|Tempêter|Temporiser|Tenailler|Tenonner|Ténoriser|Tenter|Tercer|Tergiverser|Terminer|Terrer|Terrasser|Terreauter|Terrifier|Terroriser|Terser|Teseter|Tester|Têter|Tétaniser|Textualiser|Texturer|Texturiser|Théâtraliser|Thématiser|Théoriser|Thésauriser|Tictaquer|Tiercer|Tigrer|Tiller|Timbrer|Tinter|Tintinnabuler|Tiquer|Tirer|Tirailler|Tire-bouchonner|Tirebouchonner|Tiser|Tisaner|Tisonner|Tisser|Titiller|Titrer|Tituber|Titulariser|Toaster|Togoliser|Toiler|Toiletter|Toiser|Tolérer|Tomer|Tomber|Tonifier|Tonitruer|Tonner|Tonsurer|Tontiner|Toper|Topicaliser|Toquer|Toréer|Torcher|Torchonner|Toronner|Torpiller|Torréfier|Torsader|Tortiller|Tortorer|Torturer|Tosser|Totaliser|Touer|Toubabiser|Toucher|Touiller|Toupiller|Toupiner|Tourber|Tourbillonner|Tourillonner|Tourmenter|Tourner|Tournailler|Tournasser|Tournebouler|Tournicoter|Tourniller|Tourniquer|Tournoyer|Tousser|Toussailler|Toussoter|Touter|Trier|Tracer|Trabouler|Tracaner|Tracasser|Tracter|Traficoter|Trafiquer|Traîner|Traînailler|Traînasser|Traiter|Tramer|Trancher|Tranchefiler|Tranquilliser|Transbahuter|Transborder|Transcender|Transcoder|Transférer|Transfigurer|Transfiler|Transformer|Transfuser|Transgresser|Transhumer|Transiger|Transistoriser|Transiter|Translater|Translittérer|Transmigrer|Transmuer|Transmuter|Transpercer|Transpirer|Transplanter|Transporter|Transposer|Transsubstantier|Transsuder|Transvaser|Transvider|Traquer|Traumatiser|Travailler|Travailloter|Traverser|Trébucher|Tréfiler|Treillager|Treillisser|Trémater|Trembler|Trembloter|Tremper|Trémuler|Trépaner|Trépasser|Trépider|Trépigner|Tresser|Tressauter|Treuiller|Trévirer|Trianguler|Triballer|Tricher|Tricocher|Tricoter|Trifouiller|Triller|Trimer|Trimarder|Trimbaler|Trimballer|Tringler|Trinquer|Triompher|Tripatouiller|Tripler|Tripoter|Triquer|Triséquer|Trisser|Triturer|Troler|Tromper|Trompeter|Trôner|Tronçonner|Tronquer|Tropicaliser|Troquer|Trotter|Trottiner|Trouer|Troubler|Trouilloter|Trousser|Troussequiner|Trouver|Truander|Trucider|Truffer|Truquer|Trusquiner|Truster|Tuer|Tuber|Tuberculiner|Tuberculiniser|Tuberculiser|Tuder|Tuiler|Tuméfier|Turbiner|Turlupiner|Turluter|Tûteler|Tûter|Tuteurer|Tutoyer|Tutorer|Tututer|Tuyauter|Twister|Tympaniser|Typer|Typiser|Typographier|Tyranniser|Ulcérer|Ululer|Unifier|Uniformiser|Universaliser|Urger|Urbaniser|Uriner|User|Usiner|Usurper|Utiliser|Vacciner|Vaciller|Vacuoliser|Vadrouiller|Vagabonder|Vaguer|Vaironner|Valeter|Valdinguer|Valider|Valiser|Valoriser|Valouser|Valser|Vamper|Vampiriser|Vandaliser|Vanner|Vanter|Vaporiser|Vaquer|Varier|Varapper|Varloper|Vaser|Vaseliner|Vasouiller|Vassaliser|Vaticiner|Végéter|Véhiculer|Veiller|Veiner|Vêler|Vélariser|Velouter|Vénérer|Venger|Vendanger|Venter|Ventiler|Ventouser|Verbaliser|Verbiager|Verdoyer|Verduniser|Verger|Verglacer|Vérifier|Verjuter|Vermiculer|Vermiller|Vermillonner|Vernisser|Verrouiller|Verser|Versifier|Vesser|Vétiller|Vexer|Viabiliser|Viander|Vibrer|Vibrionner|Vicier|Vider|Vidanger|Vidimer|Vieller|Vigiler|Vilipender|Villégiaturer|Viner|Vinaigrer|Vinifier|Violer|Violacer|Violenter|Violoner|Virer|Virevolter|Virguler|Viriliser|Viroler|Viser|Visionner|Visiter|Visser|Visualiser|Vitrer|Vitrifier|Vitrioler|Vitupérer|Vivifier|Vivoter|Vmer|Vocaliser|Vociférer|Voguer|Voiler|Voisiner|Voiturer|Voler|Voleter|Volatiliser|Volcaniser|Voliger|Volleyer|Volter|Voltiger|Voter|Vouer|Vousoyer|Voussoyer|Voûter|Vouvoyer|Voyager|Vriller|Vulcaniser|Vulganiser|Vulgariser|Warranter|Week-ender|Wolophiser|Yailler|Yodiser|Yoper|Yoyoter|Zébrer|Zaïrianiser|Zapper|Zerver|Zester|Zézayer|Ziber|Zieuter|Zigouiller|Ziguer|Zigzaguer|Zinguer|Zinzinuler|Zipper|Zoner|Zonzonner|Zoomer|Zouaver|Zouker|Zozoter|Zûner|Zwanzer|Zyeuter/i;

    var reg_verbe_second=/Abalourdir|Abasourdir|Abâtardir|Abêtir|Abolir|Abonnir|Aboutir|Abrutir|Accomplir|Accourcir|Adoucir|Affadir|Affaiblir|Affermir|Affranchir|Agir|Agonir|Agrandir|Aguerrir|Ahurir|Aigrir|Alanguir|Alentir|Allégir|Alourdir|Alunir|Amaigrir|Amatir|Amerrir|Ameublir|Amincir|Amoindrir|Amollir|Amortir|Anéantir|Anoblir|Anordir|Aplanir|Aplatir|Appauvrir|Appesantir|Applaudir|Appointir|Approfondir|Arrondir|Assagir|Assainir|Asservir|Assombrir|Assortir|Assoupir|Assouplir|Assourdir|Assouvir|Assujettir|Attendrir|Atterrir|Attiédir|Avachir|Avertir|Aveulir|Avilir|Bannir|Barrir|Bâtir|Baudir|Bénir|Blanchir|Blêmir|Blettir|Bleuir|Blondir|Bonir|Bondir|Bonnir|Bouffir|Brandir|Brouir|Brunir|Calmir|Catir|Chancir|Chauvir|Chérir|Choisir|Clapir|Compatir|Conir|Convertir|Cotir|Crépir|Crônir|Crounir|Croupir|Débâtir|Débleuir|Débrutir|Décatir|Décrépir|Définir|Défléchir|Défleurir|Défraîchir|Dégarnir|Dégauchir|Déglutir|Dégourdir|Dégrossir|Déguerpir|Déjaunir|Démaigrir|Démolir|Démunir|Dénantir|Dénoircir|Dépérir|Dépolir|Déraidir|Dérondir|Dérougir|Désassortir|Désemplir|Désengourdir|Désenlaidir|Désépaissir|Désétablir|Désinvestir|Désobéir|Dessaisir|Dessertir|Désunir|Déverdir|Dévernir|Divertir|Doucir|DurcirÉbahirÉbaubirÉbaudirÉblouirÉcatirÉchampirÉclaircirÉcrouir|EffleurirÉlargirÉlégir|Embellir|Emboutir|Embrunir|Emplir|Empuantir|Enchérir|Endolorir|Endurcir|Enforcir|Enfouir|Engloutir|Engourdir|Enhardir|Enlaidir|Ennoblir|Enorgueillir|Enrichir|Ensevelir|Envahir|EnvieillirÉpaissirÉpanouirÉpoutirÉquarrir|EstourbirÉtablirÉtourdirÉtrécir|Faiblir|Farcir|Finir|Fléchir|Flétrir|Fleurir|Forcir|Fouir|Fourbir|Fournir|Fraîchir|Franchir|Frémir|Froidir|Garantir|Garnir|Gauchir|Gémir|Glapir|Glatir|Grandir|Gravir|Grossir|Guérir|Haïr|Havir|Hennir|Honnir|Hourdir|Impartir|Infléchir|Interagir|Intervertir|Invertir|Investir|Jaillir|Jaunir|Jouir|Languir|Lotir|Louchir|Maigrir|Matir|Mégir|Meurtrir|Mincir|Moisir|Moitir|Mollir|Mugir|Munir|Mûrir|Nantir|Noircir|Nordir|Nourrir|Obéir|Obscurcir|Ourdir|Pâlir|Pâtir|Périr|Pervertir|Pétrir|Polir|Pourrir|Préétablir|Préfinir|Prémunir|Punir|Rabêtir|Rabonnir|Rabougrir|Raccourcir|Racornir|Radoucir|Rafantir|Raffermir|Rafraîchir|Ragaillardir|Ragrandir|Raidir|Rajeunir|Ralentir|Ramollir|Rancir|Raplatir|Rapointir|Rappointir|Rassortir|Ravir|Ravilir|Réagir|Réassortir|Rebâtir|Rebaudir|Reblanchir|Rebondir|Rechampir|Réchampir|Reconvertir|Recrépir|Redéfinir|Redémolir|Réfléchir|Refleurir|Refroidir|Régir|Regarnir|Regrossir|Réinvestir|Rejaillir|Réjouir|Rélargir|Rembrunir|Remplir|Renchérir|Rendurcir|Renformir|Répartir|Repolir|Resalir|Resplendir|Ressaisir|Ressurgir|Resurgir|Rétablir|Retentir|Rétrécir|Rétroagir|Réunir|Réussir|Reverdir|Revernir|Revomir|Roidir|Rondir|Rosir|Rôtir|Rouir|Rougir|Roussir|Roustir|Rugir|Saisir|Salir|Saurir|Serfouir|Sertir|Sévir|Sous-investir|Subir|Subvertir|Superfinir|Surir|Surenchérir|Surfleurir|Surgir|Surinvestir|Tarir|Tartir|Ternir|Terrir|Tiédir|Trahir|Transir|Travestir|Unir|Vagir|Verdir|Vernir|Vieillir|Vioquir|Vomir|Vrombir/i;

    var reg_verbe_troisieme = /abattre|absoudre|abstraire|accourir|accroître|accueillir|acquérir|adjoindre|admettre|advenir|aller|apercevoir|apparaître|appartenir|appendre|apprendre|assaillir|astreindre|atteindre|attendre|avenir|avoir|battre|boire|bouillir|braire|bruire|ceindre|choir|circoncire|circonscrire|circonvenir|clore|combattre|commettre|comparaître|complaire|comprendre|compromettre|concevoir|conclure|concourir|condescendre|conduire|confire|confondre|conjoindre|connaître|conquérir|consentir|construire|contenir|contraindre|contrebattre|contredire|contrefaire|contrefoutre|contrevenir|convaincre|convenir|correspondre|corrompre|coudre|courir|couvrir|craindre|croire|croître|cueillir|cuire|débattre|débouillir|décevoir|déchoir|déclore|déconfire|découdre|découvrir|décrire|décroître|croître|décroître|dédire|déduire|défaire|défaillir|défendre|démentir|démettre|démordre|départir|dépeindre|dépendre|déplaire|dépourvoir|déprendre|désapprendre|descendre|desservir|déteindre|détendre|détenir|détordre|détruire|devenir|dévêtir|devoir|dire|disconvenir|discourir|disjoindre|disparaître|dissoudre|distendre|distordre|distraire|dormir|ébattre|échoir|éclore|éconduire|écrire|élire|embattre|embattre|emboire|émettre|émoudre|émouvoir|empreindre|enceindre|enclore|encourir|endormir|enduire|enfreindre|enjoindre|enquérir|ensuivre|entendre|entrapercevoir|entrebattre|entre-détruire|entre-luire|entre-nuire|entreprendre|entretenir|entrevoir|entrouvrir|épandre|éperdre|épreindre|éprendre|équivaloir|éteindre|étendre|étreindre|être|exclure|extraire|faire|faillir|falloir|feindre|fendre|fondre|forclore|forfaire|foutre|frire|fuir|geindre|gésir|inclure|induire|inscrire|instruire|interdire|interrompre|intervenir|introduire|joindre|lire|luire|maintenir|malfaire|méconnaître|médire|méfaire|mentir|méprendre|messeoir|mettre|mévendre|mordre|morfondre|moudre|mourir|mouvoir|naître|nuire|obtenir|obvenir|occlure|offrir|oindre|omettre|ouïr|ouvrir|paître|paraître|parcourir|parfaire|parfondre|partir|parvenir|peindre|pendre|percevoir|perdre|permettre|plaindre|plaire|pleuvoir|poindre|pondre|pourfendre|poursuivre|pourvoir|pouvoir|prédire|prendre|prescrire|pressentir|prétendre|prévaloir|prévenir|prévoir|produire|promettre|promouvoir|proscrire|provenir|quérir|rabattre|rasseoir|réadmettre|réapparaître|réapprendre|rebattre|recevoir|reclure|recomparaître|reconduire|reconnaître|reconquérir|reconstruire|recoudre|recourir|recouvrir|récrire|recroître|recueillir|recuire|redécouvrir|redéfaire|redescendre|redevenir|redevoir|redire|redormir|réduire|réécrire|réélire|réentendre|refaire|refendre|refondre|réinscrire|réintroduire|rejoindre|relire|reluire|remettre|remordre|remoudre|renaître|rendormir|rendre|renduire|rentrouvrir|repaître|répandre|reparaître|repartir|repeindre|rependre|repentir|reperdre|repleuvoir|répondre|reprendre|reproduire|requérir|résoudre|ressentir|resservir|ressortir|ressouvenir|restreindre|reteindre|retendre|retenir|retondre|retordre|retraduire|retraire|retranscrire|retransmettre|rétreindre|revaloir|revendre|revenir|revêtir|revêtir|revivre|revoir|revouloir|rire|rompre|rouvrir|saillir|s'abstenir|s'asseoir|satisfaire|savoir|secourir|séduire|entremettre|sentir|servir|seoir|sortir|souffrir|soumettre|sourire|souscrire|sous-entendre|sous-tendre|soustraire|soutenir|souvenir|subvenir|suffire|suivre|surfaire|surprendre|surproduire|surseoir|survenir|survivre|suspendre|taire|teindre|tendre|tenir|tondre|tordre|traduire|traire|transcrire|transmettre|transparaître|tressaillir|vaincre|valoir|vendre|venir|vêtir|vivre|voir|vouloir/

    var reg_verbe_troisieme_imp = /abat|absoud|abstrais|accour|accroît|accueillir|acquér|adjoind|admet|adviens|aller|apercevoir|apparaître|appartiens|append|apprend|assaillir|astreind|atteind|attend|aviens|avoir|bat|boit|bouillir|brais|bruit|ceind|choir|circoncit|circonscrit|circonviens|clore|combat|commet|comparaître|complais|comprend|compromet|concevoir|conclure|concour|condescend|conduit|confit|confond|conjoind|connaître|conquér|consent|construit|contiens|contraind|contrebat|contredit|contrefais|contrefoutre|contreviens|convaincre|conviens|correspond|corrompre|coud|cour|couvr|craind|croit|croît|cueillir|cuit|débat|débouillir|décevoir|déchoir|déclore|déconfit|découd|découvr|décrit|décroît|croît|décroît|dédit|déduit|défais|défaillir|défend|dément|démet|démord|départi|dépeind|dépend|déplais|dépourvoir|déprend|désapprend|descend|desservir|déteind|détend|détiens|détord|détruit|deviens|dévêti|devoir|dit|disconviens|discour|disjoind|disparaître|dissoud|distend|distord|distrais|dormir|ébat|échoir|éclore|éconduit|écrit|élit|embat|embat|emboit|émet|émoud|émouvoir|empreind|enceind|enclore|encour|endormir|enduit|enfreind|enjoind|enquér|ensuivre|entend|entrapercevoir|entrebat|entre-détruit|entre-luit|entre-nuit|entreprend|entretiens|entrevoir|entrouvr|épand|éperd|épreind|éprend|équivaloir|éteind|étend|étreind|être|exclure|extrais|fais|faillir|falloir|feind|fend|fond|forclore|forfais|foutre|frit|fuir|geind|gésir|inclure|induit|inscrit|instruit|interdit|interrompre|interviens|introduit|joind|lit|luit|maintiens|malfais|méconnaître|médit|méfais|ment|méprend|messeoir|met|mévend|mord|morfond|moud|mour|mouvoir|naître|nuit|obtiens|obviens|occlure|offr|oind|omet|ouïr|ouvr|paître|paraître|parcour|parfais|parfond|parti|parviens|peind|pend|percevoir|perd|permet|plaind|plais|pleuvoir|poind|pond|pourfend|poursuivre|pourvoir|pouvoir|prédit|prend|prescrit|pressent|prétend|prévaloir|préviens|prévoir|produit|promet|promouvoir|proscrit|proviens|quér|rabat|rasseoir|réadmet|réapparaître|réapprend|rebat|recevoir|reclure|recomparaître|reconduit|reconnaître|reconquér|reconstruit|recoud|recour|recouvr|récrit|recroît|recueillir|recuit|redécouvr|redéfais|redescend|redeviens|redevoir|redit|redormir|réduit|réécrit|réélit|réentend|refais|refend|refond|réinscrit|réintroduit|rejoind|relit|reluit|remet|remord|remoud|renaître|rendormir|rend|renduit|rentrouvr|repaître|répand|reparaître|reparti|repeind|repend|repent|reperd|repleuvoir|répond|reprend|reproduit|requér|résoud|ressent|resservir|ressorti|ressouviens|restreind|reteind|retend|retiens|retond|retord|retraduit|retrais|retranscrit|retransmet|rétreind|revaloir|revend|reviens|revêti|revêti|revivre|revoir|revouloir|rit|rompre|rouvr|saillir|s'abstiens|s'asseoir|satisfais|savoir|secour|séduit|entremet|sent|servir|seoir|sorti|souffr|soumet|sourit|souscrit|sous-entend|sous-tend|soustrais|soutiens|souviens|subviens|suffit|suivre|surfais|surprend|surproduit|surseoir|surviens|survivre|suspend|tais|teind|tend|tiens|tond|tord|traduit|trais|transcrit|transmet|transparaître|tressaillir|vaincre|valoir|vend|viens|vêti|vivre|voir|vouloir/
    */
    var reg_firstspace = /^(\s)/ig;

    var reg_art_def = /^[le|la|les|l']$/i;
    var reg_art_indef = /^[un|une|des]$/i;
    var reg_art_partitif = /^[du|de]$/i;
    var reg_appartenance = /^[à|aux|au]$/i;

    var reg_name = /Jarvis/ig;
    var reg_bonjour = /^bonjour|salut|hello|hey/ig;
    var reg_cava = /ça va$|comment vas-tu|tu vas bien|comment tu vas|bien ou bien/ig;
    var reg_bien = /je vais bien|ca va bien|ca va aussi|super bien/ig;
    var reg_watisit = /C'est quoi|qu'est-ce que c'est|t'as fait quoi encore|qu'est-ce que tu as fait/ig;
    var reg_say_hello = /dis bonjour à (\w+)(\s\w+)?|tu pourrais dire bonjour à (\w+)(\s\w+)?/i;
    var reg_hour = /quelle heu|qu'elle heu|moi l'heure/i;
    var reg_date = /est le combien|quel jour/i;
    var reg_capacity = /fai[t|s] le café|fai[t|s] pas le café|pipe|faire le café|faire un café|fais-moi un café/i;

    var reg_etre = /^(était|été|étais|étaient|étiez|étiez|es|t'es|suis|sois|sommes|êtes|sont|fus|fut|fût|fûmes|fûtes|fûrent|sera|seras|serai|serons|serez|seront|fussent|fusses|fusse|fussiez)$/
    var reg_avoir = /^(a|ai|as|avons|avez|ont|eus|eut|eûmes|eûtes|eurent|eu|avais|avait|avions|aviez|avaient|aurai|auras|aura|aurons|aurez|auront)$/
    var reg_faire = /^(fais|fait|faisons|faites|font|fis|fit|faisais|faisait|faisions|faisiez|faisaient|ferai|feras|fera|ferons|ferez)$/
    var reg_aller = /^(vais|va|vas|allons|allez|vont|allais|allai|allait|allions|alliez|allaient|irai|iras|ira|irons|irez|iront)$/

    var order_table = new Array();
    order_table["crée"] = 1;//acte de création
    order_table["fais"] = 1;//acte de création
    order_table["concois"] = 1;//acte de création
    order_table["élabore"] = 1;//acte de création
    order_table["invente"] = 1;//acte de création
    order_table["produis"] = 1;//acte de création
    order_table["ajoute"] = 1;//acte de création
    order_table["modifi"] = 2;//acte de modification générale
    order_table["change"] = 2;//acte de modification générale
    order_table["transforme"] = 2;//acte de modification générale
    order_table["agrandi"] = 3;//acte d'agrandissement
    order_table["élargi"] = 3;//acte d'agrandissement
    order_table["augmente"] = 3;//acte d'agrandissement

    //var reg_pronom_etre = /(^|\s)(je|tu|elle|il|moi|toi|soi|lui|leur|leurs|eux|y|nous|vous|ils|ce|cette|ça|on|j'|t'|c'|m'|me)[\s?](être|était|été|étais|étaient|étiez|étiez|es|t'es|suis|sois|sommes|êtes|sont|fus|fut|fût|fûmes|fûtes|fûrent|sera|seras|serai|serons|serez|seront|fussent|fusses|fusse|fussiez)[$|\s]/ig;
    //var reg_pronom_avoir = /(^|\s)(je|tu|elle|il|moi|toi|soi|lui|leur|leurs|eux|y|nous|vous|ils|ce|cette|ça|on|j'|t'|c'|m'|me)[\s?](a|ai|as|avons|avez|ont|eus|eut|eûmes|eûtes|eurent|eu|avais|avait|avions|aviez|avaient|aurai|auras|aura|aurons|aurez|auront|avoir)[$|\s]/ig;
    //var reg_pronom_faire = /(^|\s)(je|tu|elle|il|moi|toi|soi|lui|leur|leurs|eux|y|nous|vous|ils|ce|cette|ça|on|j'|t'|c'|m'|me)[\s?](faire|fais|fait|faisons|faites|font|fis|fit|faisais|faisait|faisions|faisiez|faisaient|ferai|feras|fera|ferons|ferez)[$|\s]/ig;

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
    function line_constructor(phrase){
      if(phrase.match(reg_firstspace)){
        console.log('premier espace retiré');
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
          if(analyse_word_table[i - 1] && (analyse_word_table[i - 1].match(/à|au|aux|le|la/i) || (analyse_word_table[i - 1].match(/la|le/i) && analyse_word_table[i - 2].match(/à|a/i)))){
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
      phrase = phrase.replaceAll(/[^|\s]êtes-vous[$|\s]/gi, "vous êtes");

      analyse_word_table = phrase.split(' ');
      analyse_type_table = new Array(analyse_word_table.lenght);

      var say_it = '';
      var i = 0;
      while(analyse_word_table[i]){
        if(analyse_word_table[i].match(reg_art_def) || analyse_word_table[i].match(reg_art_indef) || analyse_word_table[i].match(reg_art_partitif) || analyse_word_table[i].match(reg_appartenance)){
          //détection d'ordre
          analyse_type_table[i] = 'article';
          if(analyse_word_table[i - 1] && analyse_word_table[i + 1] && order_act == 0){
            var first_group = analyse_word_table[i - 1] + 'r';
            var second_group = analyse_word_table[i - 1] + 'r';
            if(analyse_word_table[i - 2]){
              var first_group_bis = analyse_word_table[i - 2] + 'r';
              var second_group_bis = analyse_word_table[i - 2] + 'r';
            }
            if(first_group.match(reg_verbe_premier)){
              console.error('Verbe impératif 1er groupe');
              realise_ordre(i - 1, phrase);
              say_it += analyse_word_table[i] + " ";
            }
            else if(analyse_word_table[i - 2]){
              if(first_group_bis.match(reg_verbe_premier)){
                console.error('Verbe impératif 1er groupe');
                realise_ordre(i - 2, phrase);
              }
              say_it += analyse_word_table[i] + " ";
            }
            else if(second_group.match(reg_verbe_second)){
              console.error('Verbe impératif 2ème groupe');
              realise_ordre(i - 1, phrase);
              say_it += analyse_word_table[i] + " ";
            }
            else if(analyse_word_table[i - 2]){
              if(second_group_bis.match(reg_verbe_second)){
                console.error('Verbe impératif 2ème groupe');
                realise_ordre(i - 2, phrase);
              }
            }
            else if(analyse_word_table[i - 1].match(reg_verbe_troisieme_imp) || (analyse_word_table[i - 2] && analyse_word_table[i - 2].match(reg_verbe_troisieme_imp))){
              console.error('Verbe impératif 3ème groupe');
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
        //say_it = "Le mot numéro 3 est " + analyse_word_table[2] + " .";
      }
      console.log("résultat = " + say_it);
      if(order_act == 0)
        dit_bonjour(say_it);
      console.log(analyse_word_table + "\n\n");
      console.log(analyse_type_table);
      order_act = 0;*/
    }
    function realise_ordre(id, phrase){
      order_act = 1;
      console.error("réalisation d'ordre !");
      var order_regex = /^.+[?! le| la| l'| de| du| un| une] [ le| la| l'| de| du| un| une]* (.+)$/i;
      if(order_table[analyse_word_table[id]] == 1){
        //Création
        var order_txt = phrase.replace(order_regex, '$1');
        console.error(order_txt);
        dit_bonjour("Comme ça ?");
      }
      else if(order_table[analyse_word_table[id]] == 2){
        //Modification
        var order_txt = phrase.replace(order_regex, '$1');
        console.error(order_txt);
        dit_bonjour("les résultat est " + order_txt);
      }
      else if(order_table[analyse_word_table[id]] == 3){
        //Agrandissement
        var order_txt = phrase.replace(order_regex, '$1');
        console.error(order_txt);
        dit_bonjour("Comme ça ?");
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
        var mois_table = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Décembre');
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
          dit_bonjour('Enchanté ! Que puis-je faire pour vous ?');
        else if(event.results[result_id][0].transcript.match(reg_cava))
          dit_bonjour('Je vais très bien ! Et vous ?');
        else if(event.results[result_id][0].transcript.match(reg_bien))
          dit_bonjour('Je suis heureuse que vous soyez bien !');
        else if(event.results[result_id][0].transcript.match(reg_watisit))
          dit_bonjour('Je suis une modeste intelligence artificielle créée par Romain Giovanni le premier Mars 2021');
        else if(event.results[result_id][0].transcript.match(reg_capacity))
          dit_bonjour('Je n\'ai pas encore cette capacité mais j\'y travail');
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
