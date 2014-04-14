<?php

namespace OCA\Chat\OCH\Db;

use OCA\Chat\Db\Mapper;

class MessageMapper extends Mapper{

    public function __construct(API $api) {
	parent::__construct($api, 'chat_och_messages'); // tablename is news_feeds
    }
 
    public function getMessagesByConvId($convId){
		$sql = 'SELECT * FROM `' . $this->getTableName() . '` ' . 'WHERE `convid` = ?';
		return $this->findEntities($sql, array($convId));
    }
    
}