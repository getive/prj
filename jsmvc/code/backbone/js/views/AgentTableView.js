(function(){
    window.AgentTableView = Backbone.View.extend({
        el: '#agent-tbl',
        initialize: function () {
            _.bindAll(this, 'addAllAgent', 'addOneAgent');
            console.log('AgentsView initialize');
            this.agents = window.agents;
            this.agents.bind('add', this.addOneAgent);
            this.agents.bind('reset', this.addAllAgent);
        },
        addOneAgent: function (agent) {
            var view = new AgentRowView({model: agent});
            this.$el.append(view.render().el);
        },
        addAllAgent: function () {
            this.agents.each(this.addOneAgent);
        }
    });
}());
