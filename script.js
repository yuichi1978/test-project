// DOM要素の取得
const header = document.querySelector('.page-header');
const paragraph = document.querySelector('.paragraph');
const footer = document.querySelector('.page-footer');
const toggleBtn = document.querySelector('.toggle-btn');

// 元のテキストを保存
const originalTexts = {
    header: header.querySelector('h1').textContent,
    paragraph: paragraph.textContent,
    footer: footer.querySelector('p').textContent
};

// 変更後のテキスト
const changedTexts = {
    header: 'DOMで変更されたヘッダー',
    paragraph: 'テキストがJavaScriptによって変更されました！',
    footer: '文字が切り替わりました &copy; 2025'
};

// テキストが変更されているかを追跡するフラグ
let isChanged = false;

// ボタンにイベントリスナーを設定
toggleBtn.addEventListener('click', toggleText);

// テキスト切り替え関数
function toggleText() {
    if (!isChanged) {
        // 元のテキストから変更後のテキストへ
        header.querySelector('h1').textContent = changedTexts.header;
        paragraph.textContent = changedTexts.paragraph;
        footer.querySelector('p').textContent = changedTexts.footer;
        toggleBtn.textContent = '元に戻す';
    } else {
        // 変更後のテキストから元のテキストへ
        header.querySelector('h1').textContent = originalTexts.header;
        paragraph.textContent = originalTexts.paragraph;
        footer.querySelector('p').textContent = originalTexts.footer;
        toggleBtn.textContent = 'テキスト切り替え';
    }
    
    // フラグを反転
    isChanged = !isChanged;
    
    // コンソールログ出力
    console.log('テキストが切り替わりました。現在の状態: ' + (isChanged ? '変更後' : '元のテキスト'));
}