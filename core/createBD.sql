CREATE TABLE Profils(
        IdP               Integer NOT NULL Auto_increment ,
        avatar            Varchar (100) NOT NULL,
        lastname          Varchar (50) NOT NULL ,
        firstname         Varchar (50) NOT NULL ,
        birthday           Varchar (50) ,
        address           Varchar (100)  ,
        phone             Integer ,
        securityQuestion  Varchar (500) NOT NULL ,
        email             Varchar (100) NOT NULL ,
        securityAnswer    Varchar (500) NOT NULL ,
        Constraint Pk_Prof primary key( IdP)
)ENGINE=InnoDB;

CREATE TABLE Users(
        login       Varchar (50) NOT NULL,
        password    Varchar (100) NOT NULL,
        status      Varchar (25) NOT NULL,
        IdP         Integer ,
        loginPro    Varchar (50) ,
		promo_acc	Varchar (10) ,
		online_offline varchar(10) NOT NULL,
		Constraint Pk_Usr primary key (login),
		Constraint Fk_Usr_prof FOREIGN KEY (IdP)references Profils(IdP),
		CONSTRAINT chk_promo_acc CHECK  (promo_acc='yes' or promo_acc='no')
)ENGINE=InnoDB;

CREATE TABLE Themes(
        nomTh Varchar (50) NOT NULL, 
		Constraint Pk_Th primary key(nomTh)
)ENGINE=InnoDB;

CREATE TABLE Lessons(
        IdL        Integer NOT NULL Auto_increment ,
        titleL     Varchar (100) NOT NULL,
        nbAccess   Integer ,
		nomTh     Varchar (100) ,
		Constraint Pk_Less primary key(IdL),
		Constraint Fk_Less_Th FOREIGN KEY (nomTh)references Themes(nomTh)
)ENGINE=InnoDB;

CREATE TABLE Quizzes(
        IdQz        Integer NOT NULL Auto_increment ,
        titleQz     Varchar (100) NOT NULL,
        timerQz     Time NOT NULL,
        typeQz      Varchar (100) NOT NULL,
        levelQz     Varchar (10) NOT NULL,
        nomTh      Varchar (100) NOT NULL,
		login       Varchar (50) NOT NULL,
		Constraint Pk_Usr primary key(IdQz),
		Constraint Fk_QUZ_Th FOREIGN KEY (nomTh) references Themes(nomTh),
		Constraint Fk_QUZ_Usr FOREIGN KEY (login) references Users(login)
)ENGINE=InnoDB;

CREATE TABLE Parts(
        IdPart               Integer  NOT NULL Auto_increment ,
        titlePart          	 Varchar (50) NOT NULL,
		idL                  Integer NOT NULL,
		login                Varchar (50) NOT NULL,
        post_date_U          Date NOT NULL ,
        post_acc             Varchar (50) NOT NULL,
        post_date_A          Date NOT NULL , 
		Constraint Pk_Part primary key(IdPart),
		Constraint Fk_Part_Less FOREIGN KEY (idL) references Lessons(idL),
		Constraint Fk_Part_Usr FOREIGN KEY (login) references Users(login),
		CONSTRAINT chk_acc CHECK  (post_acc='yes' or post_acc='no')
)ENGINE=InnoDB;

CREATE TABLE Questions(
        IdQ         Integer NOT NULL Auto_increment ,
		typesQ      Varchar (50) NOT NULL,
        questionQ   Varchar (500) NOT NULL ,
        timerQ      Time NOT NULL,
        IdQz  		Integer NOT NULL,
		Constraint Pk_Qst primary key(IdQ),
		Constraint Fk_Qst_Qz FOREIGN KEY (IdQz) references Quizzes(IdQz)
)ENGINE=InnoDB;


CREATE TABLE Answers(
        idA                 Integer NOT NULL Auto_increment ,
        typeA               Varchar (50) NOT NULL,
		natureA				Varchar (50) NOT NULL,
        rightAnswerA        Varchar (500) NOT NULL ,
        IdQ  		        Integer NOT NULL,
		Constraint Pk_Anw primary key(idA),
		Constraint Fk_Anw_Qst FOREIGN KEY (IdQ) references Questions(IdQ)
)ENGINE=InnoDB;


CREATE TABLE As_friend(
		login 			Varchar (50) NOT NULL,	
		login_friend 	Varchar (50) NOT NULL,	
		friend_acc		Varchar (10)  NOT NULL,
		Constraint Fk_Afrd_Usr FOREIGN KEY (login) references Users(login),
		Constraint      Pk_Afrd_Usr_Usrs Primary key (login, login_friend),
		CONSTRAINT chk_frdacc CHECK  (frein_acc='yes' or frein_acc='no')
)ENGINE=InnoDB;


CREATE TABLE Consult(
		login  		Varchar (50) NOT NULL,
        idPart 		Integer ,
        cons_date   Date NOT NULL,
        start_time  Time NOT NULL,
        end_time    Time NOT NULL,
		Constraint Fk_consult_Usr FOREIGN KEY (login) references Users(login),
		Constraint Fk_consult_UPart FOREIGN KEY (idPart) references Parts(idPart),
        Constraint      Pk_consult_Usr_Part Primary key (login, idPart)
)ENGINE=InnoDB;


CREATE TABLE Participate(
        login  Varchar (50) NOT NULL ,
        IdQz   Integer NOT NULL,
		Constraint Fk_Parpat_Usr FOREIGN KEY (login) references Users(login),
		Constraint Fk_Parpat_Qz  FOREIGN KEY (IdQz) references Quizzes(IdQz),
        Constraint      Pk_Parpat_Usr_Qz Primary key (login, IdQz)
)ENGINE=InnoDB;


CREATE TABLE Results(
        login  Varchar (50) NOT NULL ,
        IdQz   Integer NOT NULL,
        quiz_result 	Decimal(10) ,
        date_quiz  		Date NOT NULL ,
		Constraint Fk_Res_Usr FOREIGN KEY (login) references Users(login),
		Constraint Fk_Res_Qz FOREIGN KEY (IdQz)  references Quizzes(IdQz),
        Constraint      Pk_Res_Usr_Qz Primary key (login, IdQz)
)ENGINE=InnoDB;



