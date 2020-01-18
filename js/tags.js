var input= document.querySelector('input[name=tags-outside'),
    tagify= new Tagify(input);
    tagify.DOM.input.classList.add('tagify__input--outside');
    tagify.DOM.scope.parentNode.insertBefore(tagify.DOM.input, tagify.DOM.scope);