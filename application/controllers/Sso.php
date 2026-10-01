<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sso extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->config->load('sso');

        $this->load->model('auth_model');

        $this->load->library('session');
    }

    public function login()
    {
        $ticket = $this->input->get('ticket');

        if (
            empty($ticket) ||
            !preg_match(
                '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i',
                $ticket
            )
        ) {
            $this->session->set_flashdata(
                'error_msg',
                'Tautan login otomatis tidak valid.'
            );

            redirect('auth/login');
            return;
        }

        $verifyResult = $this->verifyTicket($ticket);

        if ($verifyResult === null) {

            $this->session->set_flashdata(
                'error_msg',
                'Sesi login otomatis tidak valid atau sudah kedaluwarsa. Silakan login manual.'
            );

            redirect('auth/login');
            return;
        }

        if (
            isset($verifyResult['status_code']) &&
            $verifyResult['status_code'] === 403
        ) {

            $this->session->set_flashdata(
                'error_msg',
                'Anda tidak memiliki akses ke sistem ini.'
            );

            redirect('auth/login');
            return;
        }

        if (
            empty($verifyResult['user']['uuid'])
        ) {

            $this->session->set_flashdata(
                'error_msg',
                'Sesi login otomatis tidak valid.'
            );

            redirect('auth/login');
            return;
        }

        $remoteUuid = $verifyResult['user']['uuid'];

        $login_result =
            $this->auth_model->login_via_sso(
                $remoteUuid
            );

        if ($login_result === TRUE) {

            // Tampilkan modal input produksi setelah login SSO
            $this->session->set_userdata('show_produksi_modal', true);

            redirect('home');

            return;
        }

        if ($login_result === 'not_active') {

            $this->session->set_flashdata(
                'error_msg',
                'Akun belum aktif, silakan aktifkan email Anda terlebih dahulu!'
            );

            redirect('auth/login');

            return;
        }

        if ($login_result === 'empty_dept') {

            $this->session->set_flashdata(
                'error_msg',
                'Tidak bisa login karena departemen kosong, silahkan sinkronisasi ulang!'
            );

            redirect('auth/login');

            return;
        }

        $this->session->set_flashdata(
            'error_msg',
            'Akun tidak ditemukan di sistem ini.'
        );

        redirect('auth/login');
    }

    private function verifyTicket($ticket)
    {
        $url =
            rtrim(
                $this->config->item(
                    'employee_api_url'
                ),
                '/'
            ) . '/sso/verify';

        $payload = json_encode([
            'ticket' => $ticket,
            'project_uuid' =>
                $this->config->item(
                    'this_project_uuid'
                ),
        ]);

        $ch = curl_init($url);

        curl_setopt_array($ch, [

            CURLOPT_POST => TRUE,

            CURLOPT_POSTFIELDS => $payload,

            CURLOPT_RETURNTRANSFER => TRUE,

            CURLOPT_TIMEOUT => 10,

            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Bearer ' .
                    $this->config->item(
                        'sso_verify_secret'
                    ),
            ],

        ]);

        $response = curl_exec($ch);

        $httpCode =
            curl_getinfo(
                $ch,
                CURLINFO_HTTP_CODE
            );

        $curlError = curl_error($ch);

        curl_close($ch);

        if ($curlError) {

            log_message(
                'error',
                'SSO verifyTicket cURL error: ' .
                $curlError
            );

            return null;
        }

        $decoded =
            json_decode(
                $response,
                TRUE
            );

        if ($httpCode === 403) {
            return [
                'status_code' => 403
            ];
        }

        if (
            $httpCode !== 200 ||
            empty($decoded['status']) ||
            $decoded['status'] !== 'success'
        ) {
            return null;
        }

        return $decoded;
    }
}