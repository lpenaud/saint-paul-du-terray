<?php
namespace stpaul\Domain;

use Doctrine\DBAL\Connection;

class SejourDAO
{
    /**
     * Database connection
     *
     * @var \Doctrine\DBAL\Connection
     */
    private $db;

    /**
     * Constructor
     *
     * @param \Doctrine\DBAL\Connection The database connection object
     */
    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * Return a list of all articles, sorted by date (most recent first).
     *
     * @return array A list of all articles.
     */
    public function findAll() {
        $sql = "select * from sejour order by sejno";
        $result = $this->db->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $sejours = array();
        foreach ($result as $row) {
            $sejours[$row['art_id']] = $this->buildArticle($row);
        }
        return $sejours;
    }
}