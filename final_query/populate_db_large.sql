
LOAD DATA
    LOCAL INFILE "/you_data_path/Administrator.txt"
    REPLACE INTO TABLE Administrator
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY'\n'
(UserID, Email, Passwords);


LOAD DATA
    LOCAL INFILE "/you_data_path/Dancer.txt"
    REPLACE INTO TABLE Dancer
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY'\n'
(DancerName, Nationality, Gender, Picture, DateofBirth, Style, Title, Crew);

LOAD DATA
    LOCAL INFILE "/you_data_path/Video.txt"
    REPLACE INTO TABLE Video
    FIELDS TERMINATED BY ';'
    LINES TERMINATED BY'\n'
(VideoID,VideoName, PostTime,Viewers,URL);

LOAD DATA
    LOCAL INFILE "/you_data_path/Crew.txt"
    REPLACE INTO TABLE Crew
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY'\n'
(CrewName,Nationality,OfficeWeb);

LOAD DATA
    LOCAL INFILE "/you_data_path/Contest.txt"
    REPLACE INTO TABLE Contest
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY'\n'
(ContestName,ContestTime, Site,Scale,Bonus,Poster,Winner);

LOAD DATA
    LOCAL INFILE "/you_data_path/Music.txt"
    REPLACE INTO TABLE Music
    FIELDS TERMINATED BY ';'
    LINES TERMINATED BY'\n'
(MusicID,MusicName,ReleaseTime,Viewers,URL);


LOAD DATA
    LOCAL INFILE "/you_data_path/Follow.txt"
    REPLACE INTO TABLE Follow
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY'\n'
(UserID, DancerName);

LOAD DATA
    LOCAL INFILE "/you_data_path/Perform.txt"
    REPLACE INTO TABLE Perform
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY'\n'
(DancerName,VideoID);

LOAD DATA
    LOCAL INFILE "/you_data_path/ViewCollectMusic.txt"
    REPLACE INTO TABLE ViewCollectMusic
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY'\n'
(UserID, MusicID);

LOAD DATA
    LOCAL INFILE "/you_data_path/MusicRecommendedTo.txt"
    REPLACE INTO TABLE MusicRecommendedTo
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY'\n'
(MusicID,UserID);

LOAD DATA
    LOCAL INFILE "/you_data_path/ViewCollectVideo.txt"
    REPLACE INTO TABLE ViewCollectVideo
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY'\n'
(UserID, VideoID);

LOAD DATA
    LOCAL INFILE "/you_data_path/VideoRecommendedTo.txt"
    REPLACE INTO TABLE VideoRecommendedTo
    FIELDS TERMINATED BY ','
    LINES TERMINATED BY'\n'
(VideoID,UserID);



