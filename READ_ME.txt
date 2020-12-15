/* Base */
- Estrutura de Painel: 2.0;
- Boostrap + Z-endless-dreams;
/* ------------------------------------------------- */
/* Anota��es de suporte */
- Desenvolvido por: Jos� Andr� Fernandes Sabino (joseafs)
- Empresa: Byte a Byte;

/* ------------------------------------------------- */
/* Banco */
- _rf_ : liga��o entre duas tabelas;
- _ : espa�amento de nomenclatura;
- coluna 'ctrl' (controller): reservado a configura��es espec�ficas, normalmente, cada tabela ter� instru��es de ctrl (abaixo);

- Exluido:
0 - Registro comum;
1 - Registro excluido/oculto;
2 - Registro oculto de uma listagem, mas, existente (maior utilidade para categorias/grupos, exemplo aplicado em alguns bot�es de voltar);

- Ctrl (controller):
- Criado para evitar altera��es direto em c�digo e maior poss�bilidade de configura��es de itens singulares;
- Valores divididos por '-' s�o atributos e afetam a determinados campos/fun��es;
- "" '/' s�o sub-atributos;
- Para cada item que houver mais de um atributo, deve ser tratado via explode;

/* ------------------------------------------------- */
/* Tabela - Metatags */
Descri��o - Metadescription;
key - Keyword;
Class - personalizavel a pagina/identificador;
rf_nm - identifica a pagina orignal;
/* ------------- */
Campo Banner em metatags:
- Cada explode puxa um conjunto de opcoes divididos por '/';
- Seleciona diretamente o ID do item;

1 explode: config. de tipo;
2 explode: " target;
3 explode: " permitido(1) ou n�o(0) adicionar/apagar (registro dever� existir);
/* ------------------------------------------------- */
/* Midia_social */
- ctrl: on(1) e off(0);

/* ------------------------------------------------- */
Campo config em texto:
- Cada explode puxa um conjunto de opcoes divididos por '/';
- Reservado a uma configura��o interna de texto;
- ctrl: on(1) e off(0);

(bd)
(1)0 : titulo;
(2)1 : subtitulo;
(3)2 : texto;
(4)3 : foto;
(5)4 : video;
(6)5 : Se campo pode ou n�o ser exclu�do por usu�rio;
(7)6 : bot�o voltar (opcional/provis�rio);
(8)7 : topico (caso um texto tenha topicos internos);
(x)x : autor/assinatura(inutilizado);
...(Seguir em sequencia para cada campo interno alter�vel)
/* ------------------- */



