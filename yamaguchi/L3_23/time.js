// 目標日時を設定（来年の1月1日）
const nextYear = new Date().getFullYear() + 1;
const targetDate = new Date(`${nextYear}-01-01T00:00:00`);

// HTML要素を取得
const timerEl = document.getElementById("timer");
const messageEl = document.getElementById("message");

// 2桁に揃える
function pad(num) {
  return num.toString().padStart(2, "0");
}

// タイマー更新処理
function updateTimer() {
  const now = new Date(); // 現在時刻を取得
  const diff = targetDate - now; // 残り時間（ミリ秒）

  // 0以下になった場合 → カウント終了
  if (diff <= 0) {
    timerEl.textContent = "00:00:00";
    messageEl.textContent = "🎉 新年になりました！ 🎉";
    return;
  }

  const sec = Math.floor(diff / 1000);
  const h = pad(Math.floor(sec / 3600));
  const m = pad(Math.floor((sec % 3600) / 60));
  const s = pad(sec % 60);

  timerEl.textContent = `${h}:${m}:${s}`;
  messageEl.textContent = `来年まであと「${h}時間${m}分${s}秒」です。`;
}

// 初回表示
updateTimer();

// 1秒ごとに更新
setInterval(updateTimer, 1000);
