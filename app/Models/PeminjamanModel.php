<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
  protected $table            = 'peminjaman';
  protected $primaryKey       = 'id';
  protected $useAutoIncrement = true;
  protected $returnType       = 'array';
  protected $useSoftDeletes   = false;
  protected $protectFields    = true;
  protected $allowedFields    = ['nim', 'kode_brg', 'status', 'tgl_pinjam', 'tgl_kembali', 'catatan', 'is_dikembalikan'];

  /**
   * Retrieve all peminjaman data.
   *
   * @return array An array of peminjaman data.
   */
  public function getAll(?int $perPage = null): array
  {
    try {
      $this->builder()
        ->select('peminjaman.*, manajemen_user.nama_user, databarang.nama_brg')
        ->join('manajemen_user', 'manajemen_user.nim = peminjaman.nim', 'left')
        ->join('databarang', 'databarang.kode_brg = peminjaman.kode_brg', 'left');
      $where = "is_dikembalikan = '0' AND status != 'reject'";
      $result = $this->where($where)->paginate($perPage);

      if (empty($result)) {
        log_message('info', 'No records found for peminjaman.');
      }

      return [
        'data' => $result,
        'pager' => $this->pager
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error fetching peminjaman records: ' . $e->getMessage());
      return [];
    }
  }

  /**
   * Retrieve all the history of transactions.
   *
   * @return array Returns an array containing the result of the query.
   */
  public function getAllRiwayat(?int $perPage = null): array
  {
    try {
      $this->builder()
        ->select('peminjaman.*, manajemen_user.nama_user, databarang.nama_brg')
        ->join('manajemen_user', 'manajemen_user.nim = peminjaman.nim', 'left')
        ->join('databarang', 'databarang.kode_brg = peminjaman.kode_brg', 'left');
      $where = "is_dikembalikan = '1' OR status = 'reject'";
      $result = $this->where($where)->paginate($perPage);

      if (empty($result)) {
        log_message('info', 'No records found for riwayat.');
      }

      return [
        'data' => $result,
        'pager' => $this->pager
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error fetching riwayat records: ' . $e->getMessage());
      return [];
    }
  }

  /**
   * Retrieve all peminjaman records by nim.
   *
   * @param string $nim The nim of the user.
   * @return array An array of peminjaman records.
   */
  public function getAllByNim($nim, ?int $perPage = null): array
  {
    if (empty($nim)) {
      log_message('error', 'NIM is required.');
      return [];
    }

    try {
      $this->builder()
        ->select('peminjaman.*, manajemen_user.nama_user, databarang.nama_brg')
        ->join('manajemen_user', 'manajemen_user.nim = peminjaman.nim', 'left')
        ->join('databarang', 'databarang.kode_brg = peminjaman.kode_brg', 'left');
      $where = "peminjaman.nim = '$nim'";
      $result = $this->where($where)->paginate($perPage);

      if (empty($result)) {
        log_message('info', "No records found for NIM: $nim.");
      }

      return [
        'data' => $result,
        'pager' => $this->pager
      ];
    } catch (\Exception $e) {
      log_message('error', 'Error fetching records: ' . $e->getMessage());
      return [];
    }
  }

  /**
   * Retrieves the details of a specific peminjaman.
   *
   * @param int $id The ID of the peminjaman.
   * @return array The details of the peminjaman as an associative array, or an empty array if no records found.
   */
  public function getDetailPeminjaman($id)
  {
    if (empty($id)) {
      log_message('error', 'ID is required.');
      return [];
    }

    try {
      $result = $this->db->table($this->table)
        ->select('peminjaman.*, manajemen_user.nama_user, databarang.nama_brg')
        ->join('manajemen_user', 'manajemen_user.nim = peminjaman.nim', 'left')
        ->join('databarang', 'databarang.kode_brg = peminjaman.kode_brg', 'left')
        ->where('peminjaman.id', $id)
        ->get()
        ->getRowArray();

      if (empty($result)) {
        log_message('info', "No records found for ID: $id.");
      }

      return $result;
    } catch (\Exception $e) {
      log_message('error', 'Error fetching records: ' . $e->getMessage());
      return [];
    }
  }

  /**
   * Retrieves the user detail for a specific peminjaman.
   *
   * @param string $nim The NIM (Nomor Induk Mahasiswa) of the user.
   * @param int $id The ID of the peminjaman.
   * @return array The user detail for the specified peminjaman, or an empty array if NIM or ID is empty or no records found.
   */
  public function getUserDetailPeminjaman($nim, $id)
  {
    if (empty($nim) || empty($id)) {
      log_message('error', 'NIM and ID are required.');
      return [];
    }

    try {
      $result = $this->db->table($this->table)
        ->select('peminjaman.*, manajemen_user.nama_user, databarang.nama_brg')
        ->join('manajemen_user', 'manajemen_user.nim = peminjaman.nim', 'left')
        ->join('databarang', 'databarang.kode_brg = peminjaman.kode_brg', 'left')
        ->where('peminjaman.nim', $nim)
        ->where('peminjaman.id', $id)
        ->get()
        ->getRowArray();

      if (empty($result)) {
        log_message('info', "No records found for NIM: $nim and ID: $id.");
      }

      return $result;
    } catch (\Exception $e) {
      log_message('error', 'Error fetching records: ' . $e->getMessage());
      return [];
    }
  }

  /**
   * Store a new record in the database.
   *
   * @param array $data The data to be inserted.
   * @return bool True if the record is successfully inserted, false otherwise.
   */
  public function store($data)
  {
    if (empty($data) || !is_array($data)) {
      log_message('error', 'Invalid data provided for insertion.');
      return false;
    }

    $this->db->transStart();

    $insertResult = $this->db->table($this->table)->insert($data);

    if (!$insertResult) {
      log_message('error', 'Failed to insert data.');
      $this->db->transRollback();
      return false;
    }

    $this->db->transComplete();

    if ($this->db->transStatus() === false) {
      log_message('error', 'Transaction failed for data insertion.');
      return false;
    }

    log_message('info', 'Data inserted successfully.');
    return true;
  }

  /**
   * Updates data in the PeminjamanModel table.
   *
   * @param int $id The ID of the data to be updated.
   * @param array $data The new data to be updated.
   * @return bool Returns true if the data is updated successfully, false otherwise.
   */
  public function updateData($nim, $id, $data)
  {
    if (empty($data) || !is_array($data)) {
      log_message('error', 'Invalid data provided for update.');
      return false;
    }

    $this->db->transStart();

    $peminjaman = $this->db->table($this->table)
      ->where('id', $id)
      ->where('nim', $nim)
      ->get()
      ->getRowArray();

    if (!$peminjaman) {
      log_message('error', "Peminjaman with ID $id not found for NIM $nim.");
      $this->db->transRollback();
      return false;
    }

    if (!in_array($peminjaman['status'], ['pending', 'review'])) {
      log_message('info', sprintf("Peminjaman with ID %d is not in pending or review status.", $id));
      $this->db->transRollback();
      return false;
    }

    $updateResult = $this->db->table($this->table)
      ->where('id', $id)
      ->where('nim', $nim)
      ->update($data);

    if (!$updateResult) {
      log_message('error', "Failed to update data for ID $id.");
      $this->db->transRollback();
      return false;
    }

    $this->db->transComplete();

    if ($this->db->transStatus() === false) {
      log_message('error', "Transaction failed for data update with ID $id.");
      return false;
    }

    return true;
  }

  /**
   * Update the status of a Peminjaman record.
   *
   * @param int $id The ID of the Peminjaman record.
   * @param string $status The new status to be set ('review', 'approve' or 'reject').
   * @return bool Returns true if the status is successfully updated, false otherwise.
   */
  public function updateStatus($id, $status)
  {
    if (!in_array($status, ['review', 'approve', 'reject'])) {
      log_message('error', "Invalid status: $status.");
      return false;
    }

    $this->db->transStart();

    if (in_array($status, ['approve', 'reject'])) {
      $peminjaman = $this->db->table($this->table)
        ->where('id', $id)
        ->where('status', 'review')
        ->get()
        ->getRowArray();

      if (!$peminjaman) {
        log_message('info', "Peminjaman with ID $id is not in review status.");
        $this->db->transRollback();
        return false;
      }
    }

    $updateResult = $this->db->table($this->table)
      ->where('id', $id)
      ->update([
        'status' => $status,
      ]);

    if (!$updateResult) {
      log_message('error', "Failed to update status for ID $id.");
      $this->db->transRollback();
      return false;
    }

    $this->db->transComplete();

    if ($this->db->transStatus() === false) {
      log_message('error', "Transaction failed for updating status with ID $id.");
      return false;
    }

    return true;
  }

  /**
   * Updates the pengembalian status of a peminjaman.
   *
   * @param int $id The ID of the peminjaman.
   * @return bool Returns true if the pengembalian status is successfully updated, false otherwise.
   */
  public function updatePengembalian($id)
  {
    $this->db->transStart();

    $peminjaman = $this->db->table($this->table)
      ->where('id', $id)
      ->get()
      ->getRowArray();

    if (!$peminjaman) {
      log_message('error', "Peminjaman with ID $id not found.");
      $this->db->transRollback();
      return false;
    }

    if ($peminjaman['status'] !== 'approve') {
      log_message('info', "Peminjaman with ID $id is not approve.");
      $this->db->transRollback();
      return false;
    }

    $updateResult = $this->db->table($this->table)
      ->where('id', $id)
      ->update([
        'is_dikembalikan' => 1,
        'updated_at' => date('Y-m-d H:i:s')
      ]);

    if (!$updateResult) {
      log_message('error', "Failed to update pengembalian for ID $id.");
      $this->db->transRollback();
      return false;
    }

    $this->db->transComplete();

    if ($this->db->transStatus() === false) {
      log_message('error', "Transaction failed for updating pengembalian with ID $id.");
      return false;
    }

    return true;
  }
}
