// Исходные коды
const initialCodes = {
    html: `
  <div class="h-full flex items-center justify-center bg-rose-200">
      <h1>Пример HTML кода</h1>
      <p>Это простой пример текста.</p>
  </div>`,
    vue: `{
    template: \`<div class="h-full flex items-center justify-center bg-rose-200">
        <h1>Пример Vue компонента</h1>
        <p>Привет из Vue!</p>
    </div>\`,
    data() {
        return {
            message: 'Измените этот текст'
        };
    }
}`,
    react: `function App() {
    return (
        <div className="h-full flex items-center justify-center bg-rose-200">
            <h1>Пример React компонента</h1>
            <p>Привет из React!</p>
        </div>
    );
}
ReactDOM.render(<App />, document.getElementById('react-output'));`
};

// Инициализация редакторов
const editors = {
    html: createEditor('html-editor', 'htmlmixed'),
    vue: createEditor('vue-editor', 'javascript'),
    react: createEditor('react-editor', 'jsx')
};

// Установка начальных значений кода
Object.keys(editors).forEach(type => {
    editors[type].setValue(initialCodes[type]);
    attachAutoComplete(editors[type], getHintType(type));
    editors[type].on('change', () => updateOutput(type));
});

// Создание редакторов
function createEditor(elementId, mode) {
    return CodeMirror.fromTextArea(document.getElementById(elementId), {
        mode: mode,
        lineNumbers: true,
        theme: 'default',
        extraKeys: { "Ctrl-Space": "autocomplete" }
    });
}

// Получение подсказок для редактора
function getHintType(type) {
    return type === 'html' ? CodeMirror.hint.html : CodeMirror.hint.javascript;
}

// Автозаполнение для редакторов
function attachAutoComplete(editor, hintFunc) {
    editor.on("inputRead", function (cm, change) {
        if (change.text[0] && /[\w$<]/.test(change.text[0])) {
            cm.showHint({
                hint: hintFunc,
                completeSingle: false
            });
        }
    });
}

// Обновление вывода
function updateOutput(type) {
    const code = editors[type].getValue();
    const container = document.getElementById(`${type}-output`);

    try {
        switch (type) {
            case 'html':
                updateHtmlOutput(container, code);
                break;
            case 'vue':
                updateVueOutput(container, code);
                break;
            case 'react':
                updateReactOutput(container, code);
                break;
        }
    } catch (err) {
        displayError(container, type, err.message);
    }
}

// Обновление HTML
function updateHtmlOutput(container, code) {
    const iframeDocument = container.contentDocument || container.contentWindow.document;
    iframeDocument.open();
    iframeDocument.write(`
        <html lang="">
            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <script src="https://cdn.tailwindcss.com"></script>
                <title>Preview</title>
            </head>
            <body>${code}</body>
        </html>
    `);
    iframeDocument.close();
}

// Обновление Vue
function updateVueOutput(container, code) {
    container.innerHTML = '';
    const parsedComponent = eval(`(${code})`);
    const app = Vue.createApp(parsedComponent);
    app.mount(container);
}

// Обновление React
function updateReactOutput(container, code) {
    ReactDOM.unmountComponentAtNode(container);
    const transformedCode = Babel.transform(code, { presets: ['react'] }).code;
    eval(transformedCode);
}

// Отображение ошибок
function displayError(container, type, message) {
    const errorMessage = `Ошибка в коде ${type.charAt(0).toUpperCase() + type.slice(1)}: ${message}`;
    container.innerHTML = `<div class="text-red-600 font-bold">${errorMessage}</div>`;
}
