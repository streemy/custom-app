<?php

class FilmModel extends Model
{
    public function getFilms()
    {
//        $login = array('login' => $login);
        $STH = $this->db->prepare('SELECT * FROM films');
        $STH->execute();
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $films = $STH->fetchAll();

        return $films;
    }

    public function getFilmsByName($string)
    {
        $string = array(':string' => '%'.$string.'%');
        $STH = $this->db->prepare('SELECT * FROM films WHERE name LIKE :string');
        $STH->execute($string);
        $STH->setFetchMode(PDO::FETCH_ASSOC);
        $films = $STH->fetchAll();

        return $films;
    }
}
