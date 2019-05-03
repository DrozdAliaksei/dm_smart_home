<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class InstallationSchemeRepository
 *
 */
class InstallationSchemeRepository extends EntityRepository
{

    /**
     * @return array
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getList() : array
    {
        $conn = $this->_em->getConnection();
        $sql =
            'SELECT installation_scheme.id,rooms.name AS room_name,equipments.name AS equipment_name,displayable_name,status
            FROM installation_scheme    
            INNER JOIN rooms ON installation_scheme.room_id = rooms.id
            INNER JOIN equipments ON installation_scheme.equipment_id = equipments.id';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    /**
     * @param int $id
     * @param int $status
     * @throws \Doctrine\DBAL\DBALException
     */
    public function changeStatus(int $id, int $status)
    {
        $conn = $this->_em->getConnection();
        $sql = 'UPDATE installation_scheme
                SET status =:status 
                WHERE id =:id';
        $conn->prepare($sql)->execute(['id' => $id, 'status' => $status]);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getScheme($id)
    {
        $conn = $this->_em->getConnection();
        $sql = 'SELECT * FROM installation_scheme WHERE id = :id';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $id]);

        return $stmt->fetch();
    }
}