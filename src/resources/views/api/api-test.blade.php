<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>APIテスト</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f5f5f5;
      padding: 40px;
    }

    h1 {
      margin-bottom: 20px;
    }

    .container {
      background: #fff;
      padding: 20px;
      max-width: 500px;
      margin: 0 auto;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .box {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }

    input {
      width: 70%;
      padding: 5px;
    }

    button {
      padding: 5px;
      margin-left: 15px;
      border: none;
      background: #3490dc;
      color: #fff;
      cursor: pointer;
      border-radius: 4px;
    }

    button:hover {
      background: #2779bd;
    }

    ul {
      margin-top: 20px;
    }

    li {
      padding: 5px 0;
      border-bottom: 1px solid #ddd;
    }
  </style>
</head>

<body>
  <div class="container">

    <h1>APIテスト画面</h1>

    <!-- 保存処理 -->
    <form action="" id="task-form">
      <label for="title">タスク名</label>
      <div class="box">

        <input type="text" id="title" name="title" placeholder="タスクを入力">

        <button type="submit">タスクを保存</button>
      </div>
    </form><!-- /#task-form -->

    <!-- 一覧取得 -->
    <button id="fetch-btn">タスク一覧を取得</button><!-- /#fetch-btn -->

  </div><!-- /.container -->

  <script>
    // タスク一覧取得
    document.getElementById('fetch-btn').addEventListener('click', async () => {
      const response = await fetch('/api/tasks');
      const result = await response.json();

      const ul = document.getElementById('result');
      ul.innerHTML = '';

      result.data.forEach(task => {
        const li = document.createElement('li');
        li.textContent = `${task.id} : ${task.title}`;
        ul.appendChild(li);
      });
    });

    // タスク保存
    document.getElementById('task-form').addEventListener('submit', async (e) => {
      e.preventDefault();

      const title = document.getElementById('title').value;

      const response = await fetch('/api/tasks', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          title: title
        })
      });

      const result = await response.json();

      alert(result.message);

      document.getElementById('title').value = '';
    });
  </script>
</body>

</html>