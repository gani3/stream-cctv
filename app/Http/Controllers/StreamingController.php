<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class StreamingController extends Controller
{
    public function start(Request $request)
    {
        $channel = $request->input('channel');


        $username = config('stream.camera_user');
        $password = config('stream.camera_pass');
        $url      = config('stream.camera_url');

        $rtspUrl = "rtsp://$username:$password@$url/$channel";
        $outputDir = public_path("hls/stream$channel");
        $outputPath = $outputDir . '/index.m3u8';

        if (!file_exists($outputDir)) {
            mkdir($outputDir, 0777, true);
        }

        $ffmpegPath = trim(shell_exec('which ffmpeg'));

        $command = [
            $ffmpegPath,
            '-i', $rtspUrl,
            '-c:v', 'libx264',
            '-preset', 'veryfast',
            '-f', 'hls',
            '-hls_time', '2',
            '-hls_list_size', '10',
            '-hls_flags', 'delete_segments',
            $outputPath
        ];

        $process = new Process($command);
        $process->start();

        sleep(3);

        if ($process->isSuccessful() && file_exists($outputPath)) {
            return back()->with('success', "Streaming channel {$channel} berhasil dimulai.");
        } else {
            $errorLog = $process->getErrorOutput();

            // simpan log untuk keperluan debug
            file_put_contents(storage_path("logs/ffmpeg_channel_{$channel}.log"), $errorLog);
            return back()->with('error', "Gagal memulai streaming channel {$channel}");
        }
    }



    public function stop(Request $request)
    {
        $channel = $request->input('channel');
        $outputDir = public_path("hls/stream$channel");

        // hentikan stream yang sedang berlangsung
        $findCmd = "ps aux | grep ffmpeg | grep 'stream$channel/index.m3u8' | grep -v grep | awk '{print $2}'";
        $pids = explode("\n", trim(shell_exec($findCmd)));

        foreach ($pids as $pid) {
            if (is_numeric($pid)) {
                shell_exec("kill -9 " . intval($pid));
            }
        }

        if (file_exists($outputDir)) {
            // hapus file streaming sesuai channel saja
            shell_exec("find " . escapeshellarg($outputDir) . " -type f \\( -name '*.m3u8' -o -name '*.ts' \\) -delete");
        }

        return response()->json(['success' => true, 'message' => "Streaming channel $channel dihentikan."]);
    }
}
