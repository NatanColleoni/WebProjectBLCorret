/* Base */
- Estrutura de Painel: 2.0;
- Boostrap + Z-endless-dreams;
/* ------------------------------------------------- */
/* Anotações de suporte */
- Desenvolvido por: José André Fernandes Sabino (joseafs)
- Empresa: Byte a Byte;

/* ------------------------------------------------- */
/* Banco */
- _rf_ : ligação entre duas tabelas;
- _ : espaçamento de nomenclatura;
- coluna 'ctrl' (controller): reservado a configurações específicas, normalmente, cada tabela terá instruções de ctrl (abaixo);

- Exluido:
0 - Registro comum;
1 - Registro excluido/oculto;
2 - Registro oculto de uma listagem, mas, existente (maior utilidade para categorias/grupos, exemplo aplicado em alguns botões de voltar);

- Ctrl (controller):
- Criado para evitar alterações direto em código e maior possíbilidade de configurações de itens singulares;
- Valores divididos por '-' são atributos e afetam a determinados campos/funções;
- "" '/' são sub-atributos;
- Para cada item que houver mais de um atributo, deve ser tratado via explode;

/* ------------------------------------------------- */
/* Tabela - Metatags */
Descrição - Metadescription;
key - Keyword;
Class - personalizavel a pagina/identificador;
rf_nm - identifica a pagina orignal;
/* ------------- */
Campo Banner em metatags:
- Cada explode puxa um conjunto de opcoes divididos por '/';
- Seleciona diretamente o ID do item;

1 explode: config. de tipo;
2 explode: " target;
3 explode: " permitido(1) ou não(0) adicionar/apagar (registro deverá existir);
/* ------------------------------------------------- */
/* Midia_social */
- ctrl: on(1) e off(0);

/* ------------------------------------------------- */
Campo config em texto:
- Cada explode puxa um conjunto de opcoes divididos por '/';
- Reservado a uma configuração interna de texto;
- ctrl: on(1) e off(0);

(bd)
(1)0 : titulo;
(2)1 : subtitulo;
(3)2 : texto;
(4)3 : foto;
(5)4 : video;
(6)5 : Se campo pode ou não ser excluído por usuário;
(7)6 : botão voltar (opcional/provisório);
(8)7 : topico (caso um texto tenha topicos internos);
(x)x : autor/assinatura(inutilizado);
...(Seguir em sequencia para cada campo interno alterável)
/* ------------------- */



