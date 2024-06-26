# Wikpis Start Theme (WST) :smiley:

This is a start theme for WordPress projects built by Wikpis Marketing Digital. It uses npm or yarn like package manager through a package.json file, and Webpack like bundler of the JS and SCSS code.

## Installation

### Requirements

WST requires the following dependencies:

-   [Node.js](https://nodejs.org/)
-   [npm](https://www.npmjs.com/) or [yarn](https://yarnpkg.com/)

For quick start run the next commands in route where theme is located

```sh
$ npm install
$ npm run watch
```

Also you can use yarn through the next commands

```sh
$ yarn install
$ yarn watch
```

### Installation of dependencies

If you need to use some dependency in the build of your theme, you can install this through npm or yarn, using the following commands

```sh
$ npm i [dependecy]
```

or with yarn

```sh
$ yarn add [dependecy]
```

### Production

To compile the code for production, it is recommended to use the following command

```sh
$ npm run production
```

Or using yarn

```sh
$ yarn production
```

### We use the BEM methodology

##### Blocks, Elements and Modifier

##### Block example

Standalone entity that is meaningful on its own.
`header`,`container`,`menu`,`checkbox`,`input`

##### Element example

A part of a block that has no standalone meaning and is semantically tied to its block.
`menu item`,`list item`,`checkbox caption`,`header title`

##### Modifier example

A flag on a block or element. Use them to change appearance or behavior.
`disabled`,`highlighted`,`checked`,`fixed`,`size big`, `color yellow`,

![](./assets/bem.jpg)

##### Under the hood

Let’s look how one particular element on a page can be implemented in BEM. We will take button from GitHub:

![](./assets/button.jpg)

We can have a normal button for usual cases, and two more states for different ones. Because we style blocks by class selectors with BEM, we can implement them using any tags we want (`button`, a or even `div`). The naming rules tell us to use block--modifier-value syntax.

### Example one

#### HTML

```sh
    <button class="button">
        Normal button
    </button>
    <button class="button button--state-success">
        Success button
    </button>
    <button class="button button--state-danger">
        Danger button
    </button>
```

#### CSS

```sh
    .button {
        display: inline-block;
        border-radius: 3px;
        padding: 7px 12px;
        border: 1px solid #D5D5D5;
        background-image: linear-gradient(#EEE, #DDD);
        font: 700 13px/18px Helvetica, arial;
    }
    .button--state-success {
        color: #FFF;
        background: #569E3D linear-gradient(#79D858, #569E3D) repeat-x;
        border-color: #4A993E;
    }
    .button--state-danger {
        color: #900;
    }
```

### Example two

#### HTML

```sh
    <div class="head">
        <div class="head__eye head__eye--left">(o)</div>
        <div class="head__eye head__eye--right">(o)</div>
    </div>
```

### Example Thre

#### HTML

```sh
    <div class="head head--small">
        <div class="head__eye">(o)</div>
        <div class="head__eye">(o)</div>
    </div>
```

#### CSS

```sh
    .head {
    height: 5em;

    &__eye {
        height: 0.5em;
    }

    &--small {
        height: 80%;

        .head__eye {
        height: 0.4em;
        }
    }
    }
```

### Example Four

#### HTML

```sh
    <div class="head">
        <div class="head__eye head__eye--small">(o)</div>
        <div class="head__eye">(o)</div>
    </div>
```

#### CSS

```sh
    .head {
      height: 5em;

    &__eye {
        height: 0.5em;

        &--small {
        height: 0.4em;
        }
     }
    }
```

### Example Five

#### HTML

```sh
        <div class="head">
            <div class="head__eye is-closed">(o)</div>
            <div class="head__eye">(o)</div>
        </div>
```

#### CSS

```sh
    .head {
    &__eye {
        height: 0.5em;

        &.is-closed {
        height: 0;
        }
     }
    }
```

Good luck!
