<h3>Species</h3>

<script src="public/js/react.js"></script>
<script src="public/js/JSXTransformer.js"></script>
<script src="public/js/react-bootstrap-treeview.js"></script>

<script type="text/jsx">


        var species = [
            {
                name: "dolorem",
                id: 1,
                children: [ ]
            },
            {
                name: "impedit",
                id: 2,
                children: [ ]
            },
            {
                name: "animi",
                id: 3,
                children: [
                    {
                        name: "Mrs. Bettye Hilpert I",
                        id: 74,
                        children: [ ]
                    }
                ]
            },
            {
                name: "magnam",
                id: 4,
                children: [
                    {
                        name: "Prof. Woodrow Emard DDS",
                        id: 73,
                        children: [ ]
                    }
                ]
            },
            {
                name: "est",
                id: 5,
                children: [ ]
            },
            {
                name: "deleniti",
                id: 6,
                children: [ ]
            },
            {
                name: "et",
                id: 7,
                children: [ ]
            },
            {
                name: "officiis",
                id: 8,
                children: [ ]
            },
            {
                name: "ducimus",
                id: 9,
                children: [ ]
            },
            {
                name: "architecto",
                id: 10,
                children: [ ]
            },
            {
                name: "lala",
                id: 75,
                children: [ ]
            }
        ];

    React.render(
            <TreeView data={species} />,
            document.getElementById('treeview')
    );
</script>