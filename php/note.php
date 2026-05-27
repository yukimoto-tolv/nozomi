<?php
// 1. 設定
$creatorId = 'tolv_yukimoto';
$page = 1;

// 2. 記事一覧を取得するエンドポイント
$listUrl = "https://note.com/api/v2/creators/{$creatorId}/contents?kind=note&page={$page}";

$options = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64)\r\n" // 拒否対策
    ]
];
$context = stream_context_create($options);
$response = file_get_contents($listUrl, false, $context);
$data = json_decode($response, true);

if (isset($data['data']['contents'])) {
    foreach ($data['data']['contents'] as $note) {
        // ① タイトルと公開日時（日付）の取得
        $title = $note['name'];
        $publishAt = $note['publishAt'];
        $noteKey = $note['key']; // 本文取得に必要なキー

        // 3. 各記事の本文を取得するエンドポイント
        $detailUrl = "https://note.com/api/v3/notes/{$noteKey}";
        $detailResponse = file_get_contents($detailUrl, false, $context);
        $detailData = json_decode($detailResponse, true);

        // ② 本文の取得（HTML形式で格納されています）
        $body = $detailData['data']['body'] ?? '本文の取得に失敗しました';

        // 出力テスト
        echo "【タイトル】: " . $title . "\n";
        echo "【公開日時】: " . $publishAt . "\n";
        echo "【本文（一部）】: " . mb_substr(strip_tags($body), 0, 50) . "...\n";
        echo "-----------------------------------------\n";

        // サーバー負荷軽減のため1秒待機
        sleep(1);
    }
}
exit;